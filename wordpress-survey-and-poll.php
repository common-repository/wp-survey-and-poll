<?php
defined( 'ABSPATH' ) OR exit;
/**
 * Plugin Name: WordPress Survey and Poll
 * Plugin URI: http://modalsurvey.com
 * Description: Add simple surveys to your website
 * Author: Pantherius
 * Version: 1.7.5
 * Author URI: http://pantherius.com
 */
 
define( 'WP_SAP_TEXT_DOMAIN' , 'wp_sap' );
define( 'GRID_ITEMS' , '' );
define( 'WPSAP_SURVEY_VERSION' , '1.7.5' );

 
if ( ! class_exists( 'wp_sap' ) ) {
	class wp_sap {
		protected static $instance = null;
		var $wpsappreinit = 'false';
		/**
		 * Construct the plugin object
		 */
		public function __construct() {
			global $wpdb;
			// installation and uninstallation hooks
			register_activation_hook( __FILE__, array( 'wp_sap', 'activate' ) );
			register_deactivation_hook( __FILE__, array( 'wp_sap', 'deactivate' ) );
			register_uninstall_hook( __FILE__, array( 'wp_sap', 'uninstall' ) );
			add_action( 'plugins_loaded', array( $this, 'wpsap_localization' ) );
			if ( is_admin() ) {
				require_once( sprintf( "%s/settings.php", dirname( __FILE__ ) ) );
				$wp_sap_settings = new wp_sap_settings();
				$plugin = plugin_basename( __FILE__ );
				add_filter( "plugin_action_links_$plugin", array( &$this, 'plugin_settings_link' ) );
			}
			else {
				$wp_sap_url = $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
				$wp_sap_load = true;
				if ( ( strpos( $wp_sap_url, 'wp-login' ) ) !== false ) {
					$wp_sap_load = false;
				}
				if ( ( strpos( $wp_sap_url, 'wp-admin' ) ) !== false ) {
					$wp_sap_load = false;
				}
				if ( $wp_sap_load || isset( $_REQUEST[ 'sspcmd' ] ) ) {
					//integrate the public functions
					add_action( 'init', array( &$this, 'enqueue_custom_scripts_and_styles' ) );
					add_shortcode( 'survey', array( &$this, 'wpsap_shortcodes' ) );
					add_shortcode( 'wpsurveypoll', array( &$this, 'wpsap_shortcodes' ) );
					add_shortcode( 'wpsurveypoll_results', array( &$this, 'wpsap_results_shortcodes' ) );
				}
			}
		}

		public function wpsap_localization() {
			// Localization
			load_plugin_textdomain( 'wp_sap', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		public static function getInstance() {
			if ( ! isset( $instance ) ) {
				$instance = new wp_sap;
			}
		return $instance;
		}
		/**
		* Activate the plugin
		**/
		public static function activate() {
			global $wpdb;
			$db_info = array();
			//define custom data tables
			$charset_collate = '';
			if ( ! empty( $wpdb->charset ) ) {
			  $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
			}

			if ( ! empty( $wpdb->collate ) ) {
			  $charset_collate .= " COLLATE {$wpdb->collate}";
			}
			$sql = "CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . 'wp_sap_surveys' . " (
			  id varchar(255) NOT NULL,
			  name varchar(255) NOT NULL,
			  options text NOT NULL,
			  start_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			  expiry_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			  global tinyint(1) NOT NULL,
			  autoid mediumint(9) NOT NULL AUTO_INCREMENT,
			  UNIQUE KEY autoid (autoid)
			) $charset_collate";
			$wpdb->query($sql);
			$sql = "CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . 'wp_sap_questions' . " (
			  id mediumint(9) NOT NULL,
			  survey_id varchar(255) NOT NULL,
			  question text NOT NULL
			) $charset_collate";
			$wpdb->query($sql);
			$sql = "CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . 'wp_sap_answers' . " (
			  survey_id varchar(255) NOT NULL,
			  question_id mediumint(9) NOT NULL,
			  answer text NOT NULL,
			  count mediumint(9) DEFAULT '0' NOT NULL,
			  autoid mediumint(9) NOT NULL
			) $charset_collate";
			$wpdb->query($sql);
		}
		/**
		* Deactivate the plugin
		**/
		public static function deactivate() {
			wp_unregister_sidebar_widget( 'wp_sap' );
		}
		
		/**
		* Uninstall the plugin
		**/
		public static function uninstall() {
			global $wpdb;
			$db_info = array();
			delete_option( 'wpsap_ltime' );
			//define custom data tables
			$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . 'wp_sap_surveys' );
			$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . 'wp_sap_questions' );
			$wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . 'wp_sap_answers' );
		}

		function random_color() {
			return '#' . str_pad( dechex( mt_rand( 0, 0xFFFFFF ) ), 6, '0', STR_PAD_LEFT );
		}

		function filter_result( $filter, $result ) {
			$catsfilter = array_map( function( $item ) {
				return ( strtolower( trim( $item ) ) );
			}, explode( ',', $filter ) );
			if ( is_array( $catsfilter ) && isset( $result[ 0 ] ) ) {
				foreach( $result[ 0 ] as $key => $sditems ) {
					if ( ! in_array( strtolower( $sditems[ "answer" ] ), $catsfilter ) ) {
						unset( $result[ 0 ][ $key ] );
					}
				}
			}
			return $result;
		}

		public function wpsap_results_shortcodes( $atts ) {
			global $wpdb, $wpsap_answer_array;
			$unique_key = mt_rand();
			$result = "";$cat_count = array();
			if ( isset( $_REQUEST[ 'sspcmd' ] ) && $_REQUEST[ 'sspcmd' ] == "displaychart" ) {
				$unique_key = "endcontent";
			}
			extract( shortcode_atts( array(
					'id' => '-1',
					'style' => 'progressbar',
					'data' => 'full',
					'qid' => '1',
					'aid' => '',
					'titles' => '',
					'compare' => '',
					'bgcolor' => '',
					'cbgcolor' => '',
					'color' => '',
					'hidecounter' => 'no',
					'uid' => 'false',
					'limited' => 'no',
					'max' => '',
					'sort' => '',
					'title' => '<h3>',
					'init' => 'true',
					'hidequestion' => 'no',
					'pure' => 'false',
					'alternativedatas' => 'true',
					'score' => 'false',
					'top' => '',
					'session' => '',
					'legend' => 'false',
					'tooltip' => 'false',
					'percentage' => 'false',
					'progress' => 'false',
					'catmax' => 'false',
					'after' => '',
					'filter' => '',
					'decimal' => '2',
					'correct' => 'false'
				), $atts, 'survey_answers' ) );
				if ( ! isset( $atts[ 'style' ] ) ) {
					$atts[ 'style' ] = 'progressbar';
				}
				if ( ! isset( $atts[ 'sort' ] ) ) {
					$atts[ 'sort' ] = '';
				}
				if ( ! isset( $atts[ 'filter' ] ) ) {
					$atts[ 'filter' ] = '';
				}
				if ( ! isset( $atts[ 'decimal' ] ) ) {
					$atts[ 'decimal' ] = 2;
				}
				if ( ! isset( $atts[ 'title' ] ) ) {
					$atts[ 'title' ] = '<h3 class="survey_header">';
				}
				if ( ! isset( $atts[ 'qid' ] ) && ( $atts[ 'style' ] != "plain" ) ) {
					$atts[ 'qid' ] = '1';
				}
				else {
					if ( ! isset( $atts[ 'qid' ] ) ) {
						$atts[ 'qid' ] = "";
					}
				}
				if ( ! isset( $atts[ 'aid' ] ) ) {
					$atts[ 'aid' ] = '';
				}
				if ( ! isset( $atts[ 'titles' ] ) ) {
					$atts[ 'titles' ] = '';
				}
				if ( ! isset( $atts[ 'compare' ] ) ) {
					$atts[ 'compare' ] = 'false';
				}
				if ( ! isset( $atts[ 'data' ] ) ) {
					$atts[ 'data' ] = 'full';
				}
				if ( ! isset( $atts[ 'hidecounter' ] ) ) {
					$atts[ 'hidecounter' ] = 'no';
				}
				if ( ! isset( $atts[ 'uid' ] ) ) {
					$atts[ 'uid' ] = 'false';
				}
				if ( ! isset( $atts[ 'limited' ] ) ) {
					$atts[ 'limited' ] = 'no';
				}
				if ( ! isset( $atts[ 'max' ] ) ) {
					$atts[ 'max' ] = '0';
				}
				if ( ! isset( $atts[ 'postid' ] ) ) {
					$atts[ 'postid' ] = '';
				}
				if ( ! isset( $atts[ 'hidequestion' ] ) ) {
					$atts[ 'hidequestion' ] = 'no';
				}
				if ( ! isset( $atts[ 'bgcolor' ] ) ) {
					$atts[ 'bgcolor' ] = '';
				}
				if ( ! isset( $atts[ 'cbgcolor' ] ) ) {
					$atts[ 'cbgcolor' ] = '';
				}
				if ( ! isset( $atts[ 'color' ] ) ) {
					$atts[ 'color' ] = '';
				}
				if ( ! isset( $atts[ 'init' ] ) ) {
					$atts[ 'init' ] = 'true';
				}
				if ( ! isset( $atts[ 'pure' ] ) ) {
					$atts[ 'pure' ] = 'false';
				}
				if ( ! isset( $atts[ 'alternativedatas' ] ) ) {
					$atts[ 'alternativedatas' ] = 'true';
				}
				if ( ! isset( $atts[ 'percentage' ] ) ) {
					$atts[ 'percentage' ] = 'false';
				}
				if ( ! isset( $atts[ 'after' ] ) ) {
					$atts[ 'after' ] = '';
				}
				if ( ! isset( $atts[ 'score' ] ) ) {
					$atts[ 'score' ] = 'false';
				}
				if ( ! isset( $atts[ 'top' ] ) ) {
					$atts[ 'top' ] = '';
				}
				if ( ! isset( $atts[ 'session' ] ) ) {
					$atts[ 'session' ] = '';
				}
				if ( ! isset( $atts[ 'legend' ] ) ) {
					$atts[ 'legend' ] = 'false';
				}
				if ( ! isset( $atts[ 'tooltip' ] ) ) {
					$atts[ 'tooltip' ] = 'false';
				}
				if ( ! isset( $atts[ 'progress' ] ) ) {
					$atts[ 'progress' ] = 'false';
				}
				if ( ! isset( $atts[ 'catmax' ] ) ) {
					$atts[ 'catmax' ] = 'false';
				}
				if ( ! isset( $atts[ 'correct' ] ) ) {
					$atts[ 'correct' ] = 'false';
				}
				if ( ! is_single() && !is_page() && $atts[ 'limited' ] == "yes" ) {
					return('');
				}
				$args = array(
					'id' => $atts[ 'id' ],
					'style' => $atts[ 'style' ],
					'sort' => $atts[ 'sort' ],
					'title' => $atts[ 'title' ],
					'data' => $atts[ 'data' ],
					'qid' => $atts[ 'qid' ],
					'aid' => $atts[ 'aid' ],
					'hidecounter' => $atts[ 'hidecounter' ],
					'max' => $atts[ 'max' ],
					'hidequestion' => $atts[ 'hidequestion' ],
					'uid' => $atts[ 'uid' ],
					'limited' => $atts[ 'limited' ],
					'bgcolor' => $atts[ 'bgcolor' ],
					'cbgcolor' => $atts[ 'cbgcolor' ],
					'color' => $atts[ 'color' ],
					'titles' => $atts[ 'titles' ],
					'init' => $atts[ 'init' ],
					'compare' => $atts[ 'compare' ],
					'percentage' => $atts[ 'percentage' ],
					'after' => $atts[ 'after' ],
					'pure' => $atts[ 'pure' ],
					'alternativedatas' => $atts[ 'alternativedatas' ],
					'score' => $atts[ 'score' ],
					'top' => $atts[ 'top' ],
					'session' => $atts[ 'session' ],
					'legend' => $atts[ 'legend' ],
					'tooltip' => $atts[ 'tooltip' ],
					'progress' => $atts[ 'progress' ],
					'filter' => $atts[ 'filter' ],
					'decimal' => $atts[ 'decimal' ],
					'catmax' => $atts[ 'catmax' ],
					'correct' => $atts[ 'correct' ]
					);
			$catsfilter = array_map( function( $item ) {
				return ( strtolower( trim( $item ) ) );
			}, explode( ',', $args[ 'filter' ] ) );
			if ( ( $args[ 'data' ] == 'score' || $args[ 'data' ] == 'average-score' || $args[ 'data' ] == 'rating' ) && ( $args[ 'style' ] != "plain" ) ) {
				$atts[ 'qid' ] = '';
				$args[ 'qid' ] = '';
			}
			$answercats = array();
			$answercats_counts = array();
			$ssuid = "";
			$lastvotes = "";
			$timer = array();
			$already_added = array();
			$args[ 'title' ] = html_entity_decode( $args[ 'title' ] );
			$title_c = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $args['title']);
			$args[ 'title_c' ] = str_replace( "<", "</", $title_c );
			$sdatas = array();
			if( strtoupper( $args[ 'sort' ] ) == "DESC" ) {
				$sort = "count DESC";
			}
			elseif( strtoupper( $args[ 'sort' ] ) == "ASC" ) {
				$sort = "count ASC";
			}
			else {
				$sort = "autoid ASC";
			}
			if ( $args[ 'style' ] == 'plain' ) {
				if ( $args[ 'data' ] == 'full' || $args[ 'data' ] == 'full-records' ) {
				if ( $args[ 'data' ] == 'full-records' ) {
					$result = array();
				}
				$sql = "SELECT *, msq.id as question_id FROM " . $wpdb->base_prefix . "wp_sap_surveys mss LEFT JOIN " . $wpdb->base_prefix . "wp_sap_questions msq on mss.id = msq.survey_id WHERE mss.id = %d ORDER BY msq.id ASC";
				$q_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ] ) );
				if ( $args[ 'data' ] != 'full-records' ) {
					$result = "<div id='wpsap-results-" . $args[ 'id' ] . "-" . $unique_key . "' class='ms-plain-results'>";
				}
						$finaltimer = 0;
						$finalscore = 0;
						foreach( $q_sql as $key1=>$ars ) {
						if ( $args[ 'data' ] == 'full-records' ) {
						//display individual records end
								if ( $args[ 'pure' ] == "false" ) {
									$result[ $key1 ][ 'title' ] = preg_replace( '/\[.*\]/', '', $ars->question );
								}
								else {
									$result[ $key1 ][ 'title' ] = $ars->question;
								}
									$result[ $key1 ][ 'id' ] = ( $key1 + 1 );
							$sql = "SELECT * FROM " . $wpdb->base_prefix . "wp_sap_answers WHERE survey_id = %d AND question_id = %d ORDER BY %s";
							$a_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ], $ars->question_id, $sort ) );
								foreach( $a_sql as $key2=>$as ) {
									$allcount = 0;
									$aoptions = unserialize( $as->aoptions );
									foreach($a_sql as $aas){
										$allcount = $allcount + $aas->count;
									}
									$uv_ans = array();$uv_ans_rec = "";$ans_open = array();
									$selected = "false";
									if ( isset( $user_votes ) ) {
										$thisuv = $user_votes;
										if ( $aoptions[ 0 ] == "open" || $aoptions[ 0 ] == "date" || $aoptions[ 0 ] == "numeric" || $aoptions[ 0 ] == "select" ) {
											if ( isset( $thisuv[ $ars->question_id ] ) ) {
												foreach( $thisuv[ $ars->question_id ] as $key=>$uvarray ) {
													$uv_ans = explode( "|", $uvarray );
													if ( ! in_array( $uv_ans[ 0 ], $thisuv[ $ars->question_id ] ) ) {
														$thisuv[ $ars->question_id ][ $key ] = $uv_ans[ 0 ];
														if ( ! isset( $ans_open[ $uv_ans[ 0 ] ] ) ) {
															$ans_open[ $uv_ans[ 0 ] ] = $uv_ans[ 1 ];
														}
													}
												}
											}
										}
										else {
												if ( isset( $thisuv[ $ars->question_id ] ) ) {
													foreach( $thisuv[ $ars->question_id ] as $key=>$uvarray ) {
														$uv_ans_rec = explode( "|", $uvarray );
														if ( ! in_array( $uv_ans_rec[ 0 ], $thisuv[ $ars->question_id ] ) && isset( $uv_ans_rec[ 1 ] ) ) {
															$thisuv[ $ars->question_id ][ ] = $uv_ans_rec[ 0 ];
														}
													}
												}
										}
										if ( isset( $thisuv[ $ars->question_id ] ) && is_array( $thisuv[ $ars->question_id ] ) && ( in_array( $as->autoid, $thisuv[ $ars->question_id ] ) ) ) {
											$selected = "true";
											if ( isset( $ans_open[ $as->autoid ] ) ) {
												preg_match_all( "/\[([^\]]*)\]/", $as->answer, $acats );
												$as->answer = $ans_open[ $as->autoid ];
												if ( isset( $acats[ 1 ][ 0 ] ) ) {
													$result[ $key1 ][ 'datas' ][ $key2 ][ 'category' ] = $acats[ 1 ][ 0 ];
												}
												else {
													$result[ $key1 ][ 'datas' ][ $key2 ][ 'category' ] = "false";
												}											}
										}
									}
									if ( $args[ 'pure' ] == "false" ) {
										$result[ $key1 ][ 'datas' ][ $key2 ][ 'answer' ] = ( preg_replace( '/\[.*\]/', '', $as->answer ) ? ( preg_replace( '/\[.*\]/', '', $as->answer ) ) : esc_html__( 'Not Specified', WP_SAP_TEXT_DOMAIN ) );
									}
									else {
										$result[ $key1 ][ 'datas' ][ $key2 ][ 'answer' ] = $as->answer;
									}
									preg_match_all( "/\[([^\]]*)\]/", $as->answer, $acats );
									if ( ! isset( $result[ $key1 ][ 'datas' ][ $key2 ][ 'category' ] ) ) {
										if ( isset( $acats[ 1 ][ 0 ] ) ) {
											$result[ $key1 ][ 'datas' ][ $key2 ][ 'category' ] = $acats[ 1 ][ 0 ];
										}
										else {
											$result[ $key1 ][ 'datas' ][ $key2 ][ 'category' ] = "false";
										}
									}
									$result[ $key1 ][ 'datas' ][ $key2 ][ 'id' ] = ( $key2 + 1 );
									$result[ $key1 ][ 'datas' ][ $key2 ][ 'survey' ] = $q_sql[ 0 ]->name;
									$result[ $key1 ][ 'datas' ][ $key2 ][ 'selected' ] = $selected;
									$result[ $key1 ][ 'datas' ][ $key2 ][ 'votes' ] = $as->count;
									if ( $aoptions[ 0 ] == "numeric" && $aoptions[ 4 ] == 0 && is_numeric( $result[ $key1 ][ 'datas' ][ $key2 ][ 'answer' ] ) ) {
										$result[ $key1 ][ 'datas' ][ $key2 ][ 'score' ] = $result[ $key1 ][ 'datas' ][ $key2 ][ 'answer' ];										
									}
									else {
										$result[ $key1 ][ 'datas' ][ $key2 ][ 'score' ] = $aoptions[ 4 ];
									}
									$result[ $key1 ][ 'datas' ][ $key2 ][ 'correct' ] = ( ! empty( $aoptions[ 5 ] ) ? 'true' : 'false' );
									$result[ $key1 ][ 'datas' ][ $key2 ][ 'status' ] = ( ( ! isset( $aoptions[ 8 ] ) || ( $aoptions[ 8 ] == "1" ) ) ? 'inactive' : 'active' );
									$result[ $key1 ][ 'datas' ][ $key2 ][ 'percentage' ] = ( $allcount > 0 ? ( round( ( $as->count / $allcount ) * 100, 2 ) ) : '0' ) . "%";
								}
						}
						else {
							//display individual records end
							if ( isset( $timer[ $key1 + 1 ] ) && $timer[ $key1 + 1 ] >= 0 ) {
								$finaltimer += $timer[ $key1 + 1 ];
							}
							if ( $atts[ 'titles' ] != '' ) {
								$ctitles = explode( ',', $atts[ 'titles' ] );
								if ( ! empty( $ctitles[ $key1 ] ) ) {
									$ars->question = $ctitles[ $key1 ];
								}
							}
							$result .= "<div class='question-onerow'><div class='ms-question-row'><div class='ms-question-text'>" . $args[ 'title' ] . preg_replace( '/\[.*\]/', '', $ars->question ) . $args[ 'title_c' ] . "</div><div class='ms-question-block1'></div><div class='ms-question-block2'>" . ( isset( $timer[ $key1 + 1 ] ) && $finaltimer > 0  ? ( esc_html__( 'Time Required', WP_SAP_TEXT_DOMAIN ) . ": ". $timer[ $key1 + 1 ] . esc_html__( 'sec', WP_SAP_TEXT_DOMAIN ) ) : '' ) . "</div></div>";
								$sql = "SELECT * FROM " . $wpdb->base_prefix . "wp_sap_answers WHERE survey_id = %d AND question_id = %d ORDER BY %s";
								$a_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ], $ars->question_id, $sort ) );
								//start - remove inactive answers
								foreach($a_sql as $aaskey=>$bas){
									$baoptions = unserialize( $bas->aoptions );								
									if ( isset( $baoptions[ 8 ] ) && $baoptions[ 8 ] == "1" ) {
										unset( $a_sql[ $aaskey ] );
									}
								}
								//end - remove inactive answers					
								foreach( $a_sql as $key2=>$as ) {
									$allcount = 0;
									$aoptions = unserialize( $as->aoptions );
									foreach( $a_sql as $aas ) {
										$allcount = $allcount + $aas->count;
									}
									$uv_ans = array();$uv_ans_rec = "";$ans_open = array();
									$selected = "";
									if ( isset( $user_votes ) ) {
										$thisuv = $user_votes;
										if ( $aoptions[ 0 ] == "open" || $aoptions[ 0 ] == "numeric" || $aoptions[ 0 ] == "date" || $aoptions[ 0 ] == "select"  ) {
											if ( isset( $thisuv[ $ars->question_id ] ) ) {
												foreach( $thisuv[ $ars->question_id ] as $key=>$uvarray ) {
													$uv_ans = explode( "|", $uvarray );
													if ( ! in_array( $uv_ans[ 0 ], $thisuv[ $ars->question_id ] ) ) {
														$thisuv[ $ars->question_id ][ $key ] = $uv_ans[ 0 ];
														if ( ! $ans_open[ $uv_ans[ 0 ] ] ) {
															$ans_open[ $uv_ans[ 0 ] ] = $uv_ans[ 1 ];
														}
													}
												}
											}
										}
										else {
											if ( isset( $thisuv[ $ars->question_id ] ) ) {
												foreach( $thisuv[ $ars->question_id ] as $key=>$uvarray ) {
													$uv_ans_rec = explode( "|", $uvarray );
													if ( ! in_array( $uv_ans_rec[ 0 ], $thisuv[ $ars->question_id ] ) && isset( $uv_ans_rec[ 1 ] ) ) {
														$thisuv[ $ars->question_id ][ ] = $uv_ans_rec[ 0 ];
													}
												}
											}
										}
										$selectedstyle = "";
										if ( isset( $thisuv[ $ars->question_id ] ) && is_array( $thisuv[ $ars->question_id ] ) && ( in_array( $as->autoid, $thisuv[ $ars->question_id ] ) ) ) {
											$selected = " ms-answer-row-selected";
											$selectedstyle ="selected-row-style";
											if ( isset( $ans_open[ $as->autoid ] ) ) {
												$as->answer .= ': ' . $ans_open[ $as->autoid ];
											}
											$finalscore += $aoptions[ 4 ];
										}
									}
									$score_output = "";
									if ( $args[ 'score' ] == 'true' ) {
										$score_output = "<div class='ms-answer-score wsap_tooltip' title='" . esc_html__( 'Answer Score', WP_SAP_TEXT_DOMAIN ) . "'>" . $aoptions[ 4 ] . "</div>";
									}
									$checkcorrect = '';										
									if ( $aoptions[ 5 ] == '1' ) {
										$checkcorrect = '<div class="correct-mark wsap_tooltip" title="' . esc_html__( 'Correct Answer', WP_SAP_TEXT_DOMAIN ) . '"><img src="' . plugins_url( '/templates/assets/img/correct-icon.png' , __FILE__ ) . '"></div>';
									}
									$result .= "<div class='ms-answer-row" . $selected . " " . $selectedstyle . "'>" . $checkcorrect . "<div class='ms-answer-text'>" . ( preg_replace( '/\[.*\]/', '', $as->answer ) ? ( preg_replace( '/\[.*\]/', '', $as->answer ) ) : esc_html__( 'Not Specified', WP_SAP_TEXT_DOMAIN ) ) . "</div><div class='ms-answer-count wsap_tooltip' title='" . esc_html__( 'Global Votes', WP_SAP_TEXT_DOMAIN ) . "'>" . $as->count . "</div><div class='ms-answer-percentage wsap_tooltip' title='" . esc_html__( 'Global Percentage', WP_SAP_TEXT_DOMAIN ) . "'>" . ( $allcount > 0 ? ( round( ( $as->count / $allcount ) * 100, 2 ) ) : '0' ) . "%" . "</div>" . $score_output . "</div>";
								}
								$result .= "</div>";
								if ( $key1 == count( $q_sql ) - 1 ) {
									$ftimerhtml = "<span class='final-time-title'>" . esc_html__( 'Final Time', WP_SAP_TEXT_DOMAIN ) . ":</span> <span class='final-time'>" . $finaltimer . "" . esc_html__( 'sec', WP_SAP_TEXT_DOMAIN ) . "</span>";
									$result .= "<div class='final-result'>";
									if ( $finalscore != "" ) {
										$result .= "<span class='final-score-title'>" . esc_html__( 'Total Score', WP_SAP_TEXT_DOMAIN ) . ":</span> <span class='final-score'>" . $finalscore . "</span> ";
									}
									$result .= ( $finaltimer > 0 ? $ftimerhtml : "" );
									$result .= "</div>";
								}
							}
						}
				}
				if ( $args[ 'data' ] == 'question' ) {
				$sql = "SELECT *, msq.id as question_id FROM " . $wpdb->base_prefix . "wp_sap_surveys mss LEFT JOIN " . $wpdb->base_prefix . "wp_sap_questions msq on mss.id = msq.survey_id WHERE mss.id= %d ORDER BY msq.id ASC";
				$q_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ] ) );
					foreach( $q_sql as $key1=>$ars ) {
						if ( ( $key1 + 1 ) == $args[ 'qid' ] ) {
							if ( $atts[ 'init' ] == "true" ) {
								$this->wp_sap_initplugin();
							}
							return( preg_replace( '/\[.*\]/', '', $ars->question ) );
						}
					}
				}
				if ( $args[ 'data' ] == 'answer' || $args[ 'data' ] == 'answer_count' || $args[ 'data' ] == 'answer_percentage' ) {
						if ( $args[ 'aid' ] == '' && $args[ 'uid' ] == "true" ) {
							if ( isset( $_COOKIE[ 'ms-uid' ] ) ) {
								$cmsuid = $_COOKIE[ 'ms-uid' ];
							}
							else {
								$cmsuid = "";
							}
								$fullrecords = wp_sap::wpsap_results_shortcodes( 
									array ( 'id' => $args[ 'id' ], 'data' => 'full-records', 'style' => 'plain', 'uid' => $cmsuid, 'pure' => 'true' )
								);
								$uans = array();$uans_output = "";
								foreach( $fullrecords[ $args[ 'qid' ] - 1 ][ 'datas' ] as $qss ) {
									if ( $qss[ 'selected' ] == "true" ) {
										$uans[] = $qss[ 'answer' ];
									}
								}
								foreach( $uans as $key=>$userans ) {
									$uans_output .= $userans;
									if ( $key + 1 < count( $uans ) ) {
										$uans_output .= ", ";
									}
								}
								return $uans_output;
						}					
						$sql = "SELECT * FROM " . $wpdb->base_prefix . "wp_sap_answers WHERE survey_id = %d AND question_id = %d ORDER BY %s";
						$a_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ], $args[ 'qid' ], $sort ) );
						$allcount = 0;
						foreach( $a_sql as $aas ) {
							$allcount = $allcount + $aas->count;
						}
						foreach( $a_sql as $key2 => $as ) {
							if ( ( ( $key2 + 1 ) == $args[ 'aid' ] ) && ( ! empty( $args[ 'aid' ] ) ) ) {
								if ( $args[ 'data' ] == 'answer' ) {
									if ( $atts[ 'init' ] == "true" ) {
										$this->wp_sap_initplugin();
									}
									return( preg_replace( '/\[.*\]/', '', $as->answer ) );
								}
								if ( $args[ 'data' ] == 'answer_count' ) {
									if ( $atts[ 'init' ] == "true" ) {
										$this->wp_sap_initplugin();
									}
									return( $as->count );
								}
								if ( $args[ 'data' ] == 'answer_percentage' ) {
									if ( $allcount > 0 ) {
										if ( $atts[ 'init' ] == "true" ) {
											$this->wp_sap_initplugin();
										}
										return( round( ( $as->count / $allcount ) * 100, 2 ) . '%' );
									}
									else {
										if ( $atts[ 'init' ] == "true" ) {
											$this->wp_sap_initplugin();
										}
										return( '0%' );
									}
								}
							}
						}
						if ( $args[ 'data' ] == 'answer_count' ) {
							if ( $atts[ 'init' ] == "true" ) {
								$this->wp_sap_initplugin();
							}
							return( $allcount );
						}
				}
				if ( $args[ 'data' ] == 'score' || $args[ 'data' ] == 'average-score' || $args[ 'data' ] == 'rating' ) {
					$totalsumscore = 0;
					$sql = "SELECT *,msq.id as question_id FROM " . $wpdb->base_prefix . "wp_sap_surveys mss LEFT JOIN " . $wpdb->base_prefix . "wp_sap_questions msq on mss.id = msq.survey_id WHERE mss.id = %d ORDER BY msq.id ASC";
					$q_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ] ) );
					foreach( $q_sql as $key1 => $ars ) {
						$sql = "SELECT * FROM " . $wpdb->base_prefix . "wp_sap_answers WHERE survey_id = %d AND question_id = %d ORDER BY %s";
						$a_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ], $ars->question_id, $sort ) );
						//start - remove inactive answers
						foreach($a_sql as $aaskey=>$bas){
							$baoptions = unserialize( $bas->aoptions );								
							if ( isset( $baoptions[ 8 ] ) && $baoptions[ 8 ] == "1" ) {
								unset( $a_sql[ $aaskey ] );
							}
						}
						//end - remove inactive answers					
						$qscore = 0;
						$summary = 0; $allratings = 0;
						foreach( $a_sql as $key2=>$as ) {
							if ( isset( $as->aoptions ) ) {
								$aoptions = unserialize( $as->aoptions );
								if ( $aoptions[ 0 ] == "numeric" && $aoptions[ 4 ] == 0 && is_numeric( $user_votes_values[ $key1 + 1 ][ 0 ] ) ) {
									$aoptions[ 4 ] += $user_votes_values[ $key1 + 1 ][ 0 ];
								}
								if ( is_numeric( $aoptions[ 4 ] ) ) {
									preg_match_all( "/\[([^\]]*)\]/", $as->answer, $acats );
									if ( ! empty( $acats[ 1 ] ) ) {
										$acats_list = explode( ",", $acats[ 1 ][ 0 ] );
										foreach ( $acats_list as $aca ) {
											if ( isset( $aca ) ) {
												if ( ! empty( $aca ) && ! is_numeric( $aca )  ) {
													if ( ! isset( $answercats[ trim( $aca ) ] ) ) {
														$answercats[ trim( $aca ) ] = 0;
													}
													if ( ! isset( $answercats_counts[ trim( $aca ) ] ) ) {
														$answercats_counts[ trim( $aca ) ] = 0;
													}
													if ( isset( $answercats[ trim( $aca ) ] ) ) {
														$answercats[ trim( $aca ) ] += $aoptions[ 4 ] * $as->count;
													}
													if ( isset( $answercats_counts[ trim( $aca ) ] ) ) {
														$answercats_counts[ trim( $aca ) ] += $as->count;
													}
												}
											}
										}
									}
								}
								if ( $aoptions[ 0 ] == "open" || $aoptions[ 0 ] == "date" || $aoptions[ 0 ] == "numeric" || $aoptions[ 0 ] == "select" ) {
									$as->answer = esc_html__( 'Other', WP_SAP_TEXT_DOMAIN );
								}
								if ( ! empty( $aoptions[ 3 ] ) ) {
								//including image to the answer: $as->answer = '<img src="' . $aoptions[ 3 ] . '">' . $as->answer;
								}
							}
							else {
								$aoptions[ 4 ] = 0;
							}
							if ( isset( $args[ 'titles' ] ) && $args[ 'titles' ] != "" ) {
								$titles = explode( ",", $args[ 'titles' ] );
							}
							else {
								$titles = array();
							}
							if ( ! isset( $titles[ $key1 ] ) || empty( $titles[ $key1 ] ) || $titles[ $key1 ] == "" ) {
								$titles[ $key1 ] = nl2br( $ars->question );
							}
							if ( $args[ 'data' ] == 'score' || $args[ 'data' ] == 'average-score' ) {
							if ( isset( $args[ 'titles' ] ) && $args[ 'titles' ] != "" ) {
								$titles = explode( ",", $args[ 'titles' ] );
							}
							else {
								$titles = array();
							}
							if ( ! isset( $titles[ $key1 ] ) || empty( $titles[ $key1 ] ) || $titles[ $key1 ] == "" ) {
								$titles[ $key1 ] = nl2br( $ars->question );
							}
							if ( isset( $aoptions[ 4 ] ) && is_numeric( $aoptions[ 4 ] ) ) {
									if ( ! isset( $user_votes[ $key1 + 1 ] ) && $atts[ 'uid' ] != "false" ) {
										$qscore += 0;
									}
									else {
										$qscore += $as->count * $aoptions[ 4 ];
									}
								}
								else {
									$qscore += 0;								
								}
							}
							if ( $args[ 'data' ] == 'rating' ) {
							$summary += ( $key2 + 1 ) * $as->count;
							$allratings += $as->count;
							}
						}
						if ( $args[ 'data' ] == 'rating' ) {
							if ( $allratings == 0 ) {
								$exactvalue =  0;
								$decvalue = 0;
								$intvalue = 0;
							}
							else {
								$exactvalue =  ( $summary / $allratings );
								$decvalue = ceil( ( $summary / $allratings ) * 2 ) / 2;
								$intvalue = ( int ) $decvalue;
							}
							$allans_count = count( $a_sql ) - $intvalue;
							$qscore = number_format( $exactvalue, $atts[ 'decimal' ], '.', '' );
						}
						preg_match_all( "/\[([^\]]*)\]/", $titles[ $key1 ], $ques );
						if ( isset( $ques[ 1 ] ) && ! empty( $ques[ 1 ] ) ) {
							if ( ! empty( $ques[ 1 ] ) ) {
								foreach( $ques[ 1 ] as $perscat ) {
									$titles[ $key1 ] = str_replace( $perscat, "", $titles[ $key1 ] );
									if ( ! empty( $perscat ) ) {
										$titles[ $key1 ] = str_replace( array( "[", "]" ), "", trim( $perscat ) );
									}
								}
							}
						}
						$valexist = 0;
						if ( ! empty( $sdatas[ 0 ] ) ) {
								foreach ( $sdatas[ 0 ] as $qstkey=>$qst ) {
									if ( $qst[ 'answer' ] == $titles[ $key1 ] ) {
										 if ( $args[ 'data' ] == 'average-score' ) {
											$allcount = 0;
											foreach($a_sql as $aas){
												$allcount = $allcount + $aas->count;
											}
											if ( $allcount > 0 ) {
												$qscore = number_format( $qscore / $allcount, $atts[ 'decimal' ], '.', '' );
											}
											else {
												$qscore = 0;
											}
										 }
										$sdatas[ 0 ][ $qstkey ][ 'count' ] = $sdatas[ 0 ][ $qstkey ][ 'count' ] + $qscore;
										$valexist = 1;
									}
								}
						}
						if ( $valexist == 0 ) {
							if ( strlen( $titles[ $key1 ] ) > 50 ) {
								$titles[ $key1 ] = substr( $titles[ $key1 ], 0, 50 ) . "...";
							}
							if ( $titles[ $key1 ] != "-" ) {
								 if ( $args[ 'data' ] == 'average-score' ) {
									$allcount = 0;
									foreach($a_sql as $aas){
										$allcount = $allcount + $aas->count;
									}
									if ( $allcount > 0 ) {
										$qscore = number_format( $qscore / $allcount, $atts[ 'decimal' ], '.', '' );
									}
									else {
										$qscore = 0;
									}
								 }
								$sdatas[ 0 ][ $key1 ] = array( 'answer' => $titles[ $key1 ], 'count'=> $qscore );
							}
						}
					}
					if ( ! empty( $answercats ) && ( $args[ 'data' ] == 'score' || $args[ 'data' ] == 'average-score' || $args[ 'data' ] == 'rating' ) ) {
						foreach( $answercats as $ackey=>$ac ) {
							if ( ! empty( $ackey ) && ! in_array( $ackey, $already_added ) ) {
								if ( $args[ 'data' ] == 'average-score' ) {
									if ( isset( $answercats_counts[ $ackey ] ) && $answercats_counts[ $ackey ] > 0 ) {
										$sdatas[ 0 ][] = array( 'answer' => $ackey, 'count'=> round( $ac / $answercats_counts[ $ackey ], 2 ) );
									}
								}
								else {
									$sdatas[ 0 ][] = array( 'answer' => $ackey, 'count'=> $ac );
								}
								$already_added [] = $ackey;
							}
						}
					}
					if ( $args[ 'qid' ] == "" && $args[ 'aid' ] == "" && ! empty( $sdatas ) ) {
						foreach( $sdatas[ 0 ] as $sd ) {
							if ( $aoptions[ 0 ] == "numeric" && $aoptions[ 4 ] == 0 && is_numeric( $user_votes_values[ $key1 + 1 ][ 0 ] ) ) {
								$totalsumscore += $user_votes_values[ $key1 + 1 ][ 0 ];
							}
							else {
								$totalsumscore += $sd[ 'count' ];
							}
						}
						if ( $atts[ 'init' ] == "true" ) {
							$this->wp_sap_initplugin();
						}
						if ( ! empty( $args[ 'max' ] ) ) {
							if ( $args[ 'progress' ] == "true" ) {
								$additional_params = "";
								if ( $args[ 'bgcolor' ] ) {
									$bgcls = explode( ",", $args[ 'bgcolor' ] );
									if ( isset( $bgcls[ 0 ] ) ) {
										$additional_params .= ' data-foregroundColor="' . $bgcls[ 0 ] . '"';
									}
									if ( isset( $bgcls[ 1 ] ) ) {
										$additional_params .= ' data-backgroundColor="' . $bgcls[ 1 ] . '"';
									}
									if ( isset( $bgcls[ 2 ] ) ) {
										$additional_params .= ' data-targetColor="' . $bgcls[ 2 ] . '"';
									}
									if ( isset( $bgcls[ 3 ] ) ) {
										$additional_params .= ' data-fontColor="' . $bgcls[ 3 ] . '"';
									}
								}
								return ( '<div id="ms-progress-circle' . $args[ 'id' ] . '" class="wpsapsurvey-progress-circle" data-animation="1" ' . $additional_params . ' data-animationStep="5" data-percent="' . ( intval( ( $totalsumscore / $args[ 'max' ] ) * 100 ) ) . '"></div>' );
							}
							else {
								return ( intval( ( $totalsumscore / $args[ 'max' ] ) * 100 ) );
							}
						}
						if ( empty( $totalsumscore ) ) {
							$totalsumscore = 0;
						}
						return ( $totalsumscore );
					}
					else {
						if ( empty( $args[ 'qid' ] ) ) {
							return 0;
						}
					}
					if ( $args[ 'qid' ] != "" && $args[ 'aid' ] == "" ) {
						if ( ! is_numeric( $args[ 'qid' ] ) ) {
							if ( $args[ 'uid' ] != "false" ) {
								$fullrecords = wp_sap::wpsap_results_shortcodes( 
									array ( 'id' => $args[ 'id' ], 'data' => 'full-records', 'style' => 'plain', 'uid' => $args[ 'uid' ] , 'pure' => 'true', 'session' => $atts[ 'session' ] )
								);
								foreach( $fullrecords as $fr ) {
									preg_match_all( "/\[([^\]]*)\]/", $fr[ 'title' ], $cat );
									foreach( $fr[ 'datas' ] as $frd ) {
										if ( $aoptions[ 0 ] == "numeric" && $aoptions[ 4 ] == 0 && is_numeric( $frd[ 'answer' ] ) ) {
											$frd[ 'score' ] = $frd[ 'answer' ];
										}
										preg_match_all( "/\[([^\]]*)\]/", $frd[ 'answer' ], $acat );
										if ( ! isset( $acat[ 1 ][ 0 ] ) && ! empty( $frd[ 'category' ] )) {
											$acat[ 1 ][ 0 ] = $frd[ 'category' ];
										}
										if ( isset( $acat[ 1 ][ 0 ] ) ) {
											$acat_list = explode( ",", $acat[ 1 ][ 0 ] );
											foreach ( $acat_list as $acal ) {
												if ( isset( $acal ) ) {
													if ( ! empty( $acal ) && ! is_numeric( $acal ) && $frd[ 'selected' ] == "true" && $frd[ 'score' ] ) {
														if ( ! isset( $cats[ trim( $acal ) ] ) ) {
															$cats[ trim( $acal ) ] = 0;
														}
														if ( ! isset( $cats_count[ trim( $acal ) ] ) ) {
															$cats_count[ trim( $acal ) ] = 0;
														}
														if ( isset( $cats[ trim( $acal ) ] ) ) {
															$cats[ trim( $acal ) ] += $frd[ 'score' ];
														}
														if ( isset( $cats_count[ trim( $acal ) ] ) ) {
															$cats_count[ trim( $acal ) ]++;
														}
													}
												}
											}
										}
									}
								}
								if ( isset( $cats[ $args[ 'qid' ] ] ) ) {
									if ( $args[ 'data' ] == 'average-score' ) {
										$totalsumscore = round( $cats[ $args[ 'qid' ] ] / $cats_count[ $args[ 'qid' ] ], 2 );
									}
									else {					
										$totalsumscore = $cats[ $args[ 'qid' ] ];
									}
								}
							}
							else {
								if ( ! is_numeric( $qid ) && $args[ 'data' ] == "score" ) {
									$get_results = wp_sap::wpsap_results_shortcodes(
														array ( 'id' => $args[ 'id' ], 'data' => 'score', 'style' => 'radarchart', 'pure' => 'true' )
														);
									foreach( $get_results[ 0 ] as $gs ) {
										if ( $gs[ 'answer' ] == $args[ 'qid' ] ) {
											return $gs[ 'count' ];
										}
									}
								}
								if ( ! is_numeric( $qid ) && $args[ 'data' ] == "average-score" ) {
									$get_results = wp_sap::wpsap_results_shortcodes(
														array ( 'id' => $args[ 'id' ], 'data' => 'average-score', 'style' => 'radarchart', 'pure' => 'true' )
														);
									foreach( $get_results[ 0 ] as $gs ) {
										if ( $gs[ 'answer' ] == $args[ 'qid' ] ) {
											return $gs[ 'count' ];
										}
									}
								}
								if ( $args[ 'alternativedatas' ] == "false" ) {
									return ( "" );
								}
							}
						}
						else {
							$fullrecords = wp_sap::wpsap_results_shortcodes( 
								array ( 'id' => $args[ 'id' ], 'data' => 'full-records', 'style' => 'plain', 'uid' => $args[ 'uid' ] , 'pure' => 'true', 'session' => $atts[ 'session' ] )
							);
							$totalsumscore = 0;
							if ( ! empty( $fullrecords[ $qid - 1 ] ) ) {
								foreach( $fullrecords[ $qid - 1 ][ 'datas' ] as $sdkey => $sd ) {
									if ( $sd[ 'selected' ] == 'true' ) {
										$totalsumscore += $sd[ 'score' ];
									}
								}
							}
							if ( $atts[ 'init' ] == "true" ) {
								$this->wp_sap_initplugin();
							}
						}
						if ( ! empty( $args[ 'max' ] ) ) {
							if ( $args[ 'progress' ] == "true" ) {
								$additional_params = "";
								if ( $args[ 'bgcolor' ] ) {
									$bgcls = explode( ",", $args[ 'bgcolor' ] );
									if ( isset( $bgcls[ 0 ] ) ) {
										$additional_params .= ' data-foregroundColor="' . $bgcls[ 0 ] . '"';
									}
									if ( isset( $bgcls[ 1 ] ) ) {
										$additional_params .= ' data-backgroundColor="' . $bgcls[ 1 ] . '"';
									}
									if ( isset( $bgcls[ 2 ] ) ) {
										$additional_params .= ' data-targetColor="' . $bgcls[ 2 ] . '"';
									}
									if ( isset( $bgcls[ 3 ] ) ) {
										$additional_params .= ' data-fontColor="' . $bgcls[ 3 ] . '"';
									}
								}
								return ( '<div id="ms-progress-circle' . $args[ 'id' ] . '" class="wpsapsurvey-progress-circle" data-animation="1" ' . $additional_params . ' data-animationStep="5" data-percent="' . ( intval( ( $totalsumscore / $args[ 'max' ] ) * 100 ) ) . '"></div>' );
							}
							else {
								return ( intval( ( $totalsumscore / $args[ 'max' ] ) * 100 ) );
							}
						}
						return ( $totalsumscore );
					}
				}
			}
			if ( $args[ 'style' ] == 'progressbar' || $args[ 'style' ] == 'linebar' ) {
				$wpsap_answer_array[ $args[ 'id' ] . '-' . $unique_key ] = array(
					"style" => array(
						"style" => $args[ 'style' ],
						"max" => $args[ 'max' ],
						"bgcolor" => $args[ 'bgcolor' ]
						)
					);
				$result = '<div id="wpsap-results-' . $args[ 'id' ] . '-' . $unique_key . '" class="wpsap-results">';
				if ( $args[ 'data' ] == "score" || $args[ 'data' ] == "avegare-score" ) {
					if ( $args[ 'session' ] != "all" ) {
						$args[ 'session' ] == "last";
					}
					$customdata = wp_sap::wpsap_results_shortcodes( 
						array ( 'id' => $args[ 'id' ], 'data' => $args[ 'data' ], 'style' => 'barchart', 'uid' => $args[ 'uid' ], 'pure' => 'true', 'sort' => $args[ 'sort' ], 'top' => $args[ 'top' ], 'filter' => $args[ 'filter' ], 'session' => $args[ 'session' ]  )
					);
					$allcount = 0;
					foreach( $customdata[ 0 ] as $key=>$cd  ) {
						$allcount += $cd[ 'count' ];
					}
					foreach( $customdata[ 0 ] as $key=>$cd  ) {
						if ( $args[ 'hidecounter' ] == 'no' ) {
							$counter = '<span class="process_text"></span> <span class="badge badge-info right">' . $cd[ 'count' ] . ' / ' . $allcount . '</span></p>';
						}
						else {
							$counter = '<span class="process_text"></span> <span class="badge badge-info right"></span></p>';
						}
						if ( $args[ 'bgcolor' ] == "random" ) {
							$bgcolor = $this->random_color();
						}
						else {
							$bgcolor = $args[ 'bgcolor' ];
						}
						if ( $args[ 'color' ] == "random" ) {
							$color = $this->random_color();
						}
						else {
							$color = $args[ 'color' ];
						}
						if ( $allcount == 0 ) {
							$acr = '0';
						}
						else {
							$acr = round( ( $cd[ 'count' ] / $allcount ) * 100, 2 );
						}
						if ( $args[ 'style' ] == 'progressbar' ) {
							$result .= '<div class="process"><p><strong>' . $cd[ 'answer' ] . '</strong> ' . $counter . ' <input type="hidden" class="hiddenperc" value="' . $acr . '" /><div class="progress progress-info progress-striped"><div class="bar survey_global_percent" style="background-color:' . $bgcolor . ';color:' . $color . ';">' . $acr . '%</div></div>';
						}
						if ( $args[ 'style' ] == 'linebar' ) {
							$result .= '<div class="lineprocess"><p><strong>' . $cd[ 'answer' ] . '</strong> ' . $counter . ' <input type="hidden" value="' . $acr . '" class="hiddenperc" /><div class="lineprogress progress-info progress-striped"><div class="bar survey_global_percent" style="background-color:' . $bgcolor . ';color:' . $color . ';"></div><div class="perc" id="survey_perc">0%</div></div>';
						}
					}

				}
				else {
					$sql = "SELECT *,msq.id as question_id FROM " . $wpdb->base_prefix . "wp_sap_surveys mss LEFT JOIN " . $wpdb->base_prefix . "wp_sap_questions msq on mss.id = msq.survey_id WHERE mss.id = %d ORDER BY msq.id ASC";
					$q_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ] ) );		
					foreach( $q_sql as $key1 => $ars ) {
						if ( ( $args[ 'data' ] == 'full' || ( ( $key1 + 1 ) == $args[ 'qid' ] ) ) ) {
							preg_match( '/\[.*\]/', $ars->question, $ques );
							if ( ! empty( $ques ) ) {
								$ars->question = str_replace( $ques[ 0 ], "", $ars->question );
							}
						if ( $args[ 'hidequestion' ] == 'no' ) {
							$result .= $args[ 'title' ] . nl2br( $ars->question ) . $args[ 'title_c' ];
						}
						if ( $args[ 'data' ] == 'question' ) {
							$sql = "SELECT * FROM " . $wpdb->base_prefix . "wp_sap_answers WHERE survey_id = %d AND question_id = %d ORDER BY %s";
							$a_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ], $args[ 'qid' ], $sort ) );
						}
						else {
							$sql = "SELECT * FROM " . $wpdb->base_prefix . "wp_sap_answers WHERE survey_id = %d AND question_id = %d ORDER BY %s";
							$a_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ], $ars->question_id, $sort ) );
						}
						//start - remove inactive answers
						foreach($a_sql as $aaskey=>$bas){
							$baoptions = unserialize( $bas->aoptions );								
							if ( isset( $baoptions[ 8 ] ) && $baoptions[ 8 ] == "1" ) {
								unset( $a_sql[ $aaskey ] );
							}
						}
						//end - remove inactive answers

								foreach( $a_sql as $key2 => $as ) {
									$aoptions = unserialize( $as->aoptions );
									if ( $aoptions[ 0 ] == "open" || $aoptions[ 0 ] == "date" || $aoptions[ 0 ] == "numeric" || $aoptions[ 0 ] == "select" ) {
										$as->answer = esc_html__( 'Other', WP_SAP_TEXT_DOMAIN );
									}
									if ( ! empty( $aoptions[ 3 ] ) ) {
										$as->answer = '<img src="' . $aoptions[ 3 ] . '">' . $as->answer;
									}
									$allcount = 0;
									foreach( $a_sql as $aas ) {
										$allcount = $allcount + $aas->count;
									}
									if ( $allcount == 0 ) {
										$acr = '0';
									}
									else {
										$acr = round( ( $as->count / $allcount ) * 100, 2 );
									}
									if ( $args[ 'data' ] == 'full' || ( ( $key1 + 1 ) == $args[ 'qid' ] || $args[ 'data' ] == 'question' ) ) {
										if ( ( is_numeric( $args[ 'aid' ] ) && ( ( $key2 + 1 ) == $args[ 'aid' ] ) ) || ( ! is_numeric( $args[ 'aid' ] ) || $args[ 'aid' ] == '' ) ) {
											if ( $args[ 'hidecounter' ] == 'no' ) {
												$counter = '<span class="process_text"></span> <span class="badge badge-info right">' . $as->count . ' / ' . $allcount . '</span></p>';
											}
											else {
												$counter = '<span class="process_text"></span> <span class="badge badge-info right"></span></p>';
											}
											if ( $args[ 'bgcolor' ] == "random" ) {
												$bgcolor = $this->random_color();
											}
											else {
												$bgcolor = $args[ 'bgcolor' ];
											}
											if ( $args[ 'color' ] == "random" ) {
												$color = $this->random_color();
											}
											else {
												$color = $args[ 'color' ];
											}
											if ( $aoptions[ 10 ] != "" && $args[ 'tooltip' ] == "true" ) {
												$atooltip = 'data-tooltip="' . $aoptions[ 10 ] . '"';
											}
											else {
												$atooltip = "";
											}
											if ( $args[ 'style' ] == 'progressbar' ) {
												if ( ( $args[ 'filter' ] != '' && in_array( strtolower( $as->answer ), $catsfilter ) ) || ( $args[ 'filter' ] == '' ) ) {
													$result .= '<div class="process"><p><strong ' .$atooltip. '>' . preg_replace( '/\[.*\]/', '', $as->answer ) . '</strong> ' . $counter . ' <input type="hidden" class="hiddenperc" value="' . $acr . '" /><div class="progress progress-info progress-striped"><div class="bar survey_global_percent" style="background-color:' . $bgcolor . ';color:' . $color . ';">' . $acr . '%</div>';
												}
											}
											if ( $args[ 'style' ] == 'linebar' ) {
												if ( ( $args[ 'filter' ] != '' && in_array( strtolower( $as->answer ), $catsfilter ) ) || ( $args[ 'filter' ] == '' ) ) {
													$result .= '<div class="lineprocess"><p><strong ' .$atooltip. '>' . preg_replace( '/\[.*\]/', '', $as->answer ) . '</strong> ' . $counter . ' <input type="hidden" value="' . $acr . '" class="hiddenperc" /><div class="lineprogress progress-info progress-striped"><div class="bar survey_global_percent" style="background-color:' . $bgcolor . ';color:' . $color . ';"></div><div class="perc" id="survey_perc">0%</div>';
												}
											}
											if ( ( $args[ 'filter' ] != '' && in_array( strtolower( $as->answer ), $catsfilter ) ) || ( $args[ 'filter' ] == '' ) ) {
												$result .= '</div></div>';
											}
										}
										if ( ( $key2 + 1 ) == $args[ 'aid' ] ) {
											return false; //replaces break; PHP7+
										}
									}
								}
								if ( ( $key1 + 1 ) == $args[ 'qid' ] && $args[ 'data' ] != 'full' ) {
									//apply filter to remove items from the chart
									if ( $args[ 'filter' ] != '' ) {
										$sdatas = wp_sap::filter_result( $args[ 'filter' ], $sdatas );
									}
									$wpsap_answer_array[ $args[ 'id' ] . '-' . $unique_key ] = array( 
										"style" => array( 
											"style" => $args[ 'style' ],
											"max" => $args[ 'max' ],
											"bgcolor" => $args[ 'bgcolor' ],
											"cbgcolor" => $args[ 'cbgcolor' ],
											"legend" => $args[ 'legend' ]
											),
										"datas" => $sdatas
									);
									$result .= '</div>';
									if ( $atts[ 'init' ] == "true" ) {
										$this->wp_sap_initplugin();
									}
									return( $result );
								}
						}
					}
					//apply filter to remove items from the chart
					if ( $args[ 'filter' ] != '' ) {
						$sdatas = wp_sap::filter_result( $args[ 'filter' ], $sdatas );
					}
			}
			$wpsap_answer_array[ $args['id'] . '-' . $unique_key ] = array(
					"style" => array(
						"style" => $args[ 'style' ],
						"max" => $args[ 'max' ],
						"bgcolor" => $args[ 'bgcolor' ],
						"cbgcolor" => $args[ 'cbgcolor' ]
						),
					"datas" => $sdatas
				);
				$result .= '</div>';
				if ( isset( $_REQUEST[ 'sspcmd' ] ) && $_REQUEST[ 'sspcmd' ] == "displaychart" ) {
					$result .= "|endcontent-params|" . json_encode( $wpsap_answer_array[ $args['id'] . '-' . $unique_key ] );
				}
				if ( $atts[ 'init' ] == "true" ) {
					$this->wp_sap_initplugin();
				}
				return( $result );
			}
			if ( $args[ 'style' ] == 'piechart' || $args[ 'style' ] == 'barchart' || $args[ 'style' ] == 'horizontalbarchart' || $args[ 'style' ] == 'doughnutchart' || $args[ 'style' ] == 'linechart' || $args[ 'style' ] == 'polarchart' || $args[ 'style' ] == 'radarchart' ) {
				$result = '<div id="wpsap-results-' . $args[ 'id' ] . '-' . $unique_key . '" class="wpsap-results">';
				$sql = "SELECT *,msq.id as question_id FROM " . $wpdb->base_prefix . "wp_sap_surveys mss LEFT JOIN " . $wpdb->base_prefix . "wp_sap_questions msq on mss.id = msq.survey_id WHERE mss.id = %d ORDER BY msq.id ASC";
				$q_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ] ) );
				foreach( $q_sql as $key1 => $ars ) {
					if ( $args[ 'data' ] == 'full' || ( ( $key1 + 1 ) == $args[ 'qid' ] ) ) {
					$result .= '<div class="wpsap-chart' . $key1 . ' ms-chart">';
						preg_match( '/\[.*\]/', $ars->question, $ques );
						if ( ! empty( $ques ) ) {
							$ars->question = str_replace( $ques[ 0 ], "", $ars->question );
						}
						if ( $args[ 'hidequestion' ] == 'no' ) {
							$result .= $args[ 'title' ] . nl2br( $ars->question ) . $args[ 'title_c' ];			
						}
						$result .= '<div class="legendDiv"></div><canvas></canvas></div>';
						if ($args['data']=='question') {
							$ars->question_id = $args[ 'qid' ];
						}			
						$sql = "SELECT * FROM " . $wpdb->base_prefix . "wp_sap_answers WHERE survey_id = %d AND question_id = %d ORDER BY %s";								
						$a_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ], $ars->question_id, $sort ) );
						foreach( $a_sql as $key2=>$as ) {
							if ( isset( $args[ 'titles' ] ) && $args[ 'titles' ] != "" ) {
								$titles = explode( ",", $args[ 'titles' ] );
							}
							else {
								$titles = array();
							}
							if ( ! isset( $titles[ $key2 ] ) || empty( $titles[ $key2 ] ) || $titles[ $key2 ] == "" ) {
									$titles[ $key2 ] = nl2br( $as->answer );
							}
							$thisans = "";
							if ( ! empty( $titles[ $key2 ] ) ) {
								$thisans = $titles[ $key2 ];
							}
							else {
								$thisans = preg_replace( '/\[.*\]/', '', $as->answer );
							}
							$sdatas[ $key1 ][ $key2 ] = array( 'answer' => $thisans, 'count'=> $as->count );
						}
						if ( ( $key1 + 1 ) == $args[ 'qid' ] && $args[ 'data' ] != 'full' && $args[ 'data' ] != 'question' ) {
							return false; //replaces break; PHP7+
						}
					}
					if ( $args[ 'data' ] == 'score' || $args[ 'data' ] == 'average-score' || $args[ 'data' ] == 'rating' ) {
						if ( $key1 == 0 ) {
							$result .= '<div class="wpsap-chart' . $key1 . ' ms-chart">';
							$result .= '<div class="legendDiv"></div><canvas></canvas></div>';
						}
						$sql = "SELECT * FROM " . $wpdb->base_prefix . "wp_sap_answers WHERE survey_id = %d AND question_id = %d ORDER BY %s";
						$a_sql = $wpdb->get_results( $wpdb->prepare( $sql, $args[ 'id' ], $ars->question_id, $sort ) );
						//keep the cumulative results to display multiple results on the same chart
						if ( $args[ 'compare' ] == "true" ) {
							$cum_a_sql = array();
							foreach ($a_sql as $k => $v) {
								$cum_a_sql[ $k ] = clone $v;
							}
						}
						else {
							$cum_a_sql[ 0 ] = ( object ) array( "count" => 0 );
						}
						//display individual records end
						if ( isset( $titles[ $key1 ] ) ) {
							preg_match_all( "/\[([^\]]*)\]/", $titles[ $key1 ], $ques );
						}
						if ( isset( $ques[ 1 ] ) ) {
							if ( ! empty( $ques[ 1 ] ) ) {
								foreach( $ques[ 1 ] as $perscat ) {
									$titles[ $key1 ] = str_replace( $perscat, "", $titles[ $key1 ] );
									if ( ! empty( $perscat ) ) {
										$titles[ $key1 ] = str_replace( array( "[", "]" ), "", trim( $perscat ) );
										if ( ! isset( $cat_count[ $titles[ $key1 ] ] ) ) {
											$cat_count[ $titles[ $key1 ] ] = 1;
										}
										else {
											$cat_count[ $titles[ $key1 ] ]++;
										}
									}
								}
							}
						}
						$valexist = 0;
						if ( ! empty( $sdatas[ 0 ] ) ) {
								foreach ( $sdatas[ 0 ] as $qstkey=>$qst ) {
									if ( isset( $titles[ $key1 ] ) ) {
										if ( $qst[ 'answer' ] == $titles[ $key1 ] ) {
											 if ( $args[ 'data' ] == 'average-score' ) {
												$allcount = 0;
												foreach($a_sql as $aas){
													$allcount = $allcount + $aas->count;
												}
												if ( $allcount > 0 ) {
													$qscore = number_format( $qscore / $allcount, $atts[ 'decimal' ], '.', '' );
												}
												else {
													$qscore = 0;
												}
											 }
											 if ( $args[ 'compare' ] == 'true' && $args[ 'data' ] == "score"  ) {
												$gallcount = 0;
												foreach($cum_a_sql as $caas){
													$gallcount = $gallcount + $caas->count;
												}
												if ( $gallcount > 0 ) {
													$gqscore = number_format( $gqscore / $gallcount, $atts[ 'decimal' ], '.', '' );
												}
												else {
													$gqscore = 0;
												}
											 }
											$sdatas[ 0 ][ $qstkey ][ 'count' ] = $sdatas[ 0 ][ $qstkey ][ 'count' ] + $qscore;
											if ( $args[ 'compare' ] == "true" ) {
												$sdatas[ 0 ][ $qstkey ][ 'gcount' ] = $sdatas[ 0 ][ $qstkey ][ 'gcount' ] + $gqscore;
											}
											$valexist = 1;
										}
									}
								}
						}
						if ( $valexist == 0 ) {
							if ( isset( $titles[ $key1 ] ) ) {
								if ( strlen( $titles[ $key1 ] ) > 50 ) {
									$titles[ $key1 ] = substr( $titles[ $key1 ], 0, 50 ) . "...";
								}
								if ( $titles[ $key1 ] != "-" ) {
									 if ( $args[ 'data' ] == 'average-score' ) {
										$allcount = 0;
										foreach($a_sql as $aas){
											$allcount = $allcount + $aas->count;
										}
										if ( $allcount > 0 ) {
											$qscore = number_format( $qscore / $allcount, $atts[ 'decimal' ], '.', '' );
										}
										else {
											$qscore = 0;
										}
									 }
									 if ( $args[ 'compare' ] == 'true' && $args[ 'data' ] == "score" ) {
										$gallcount = 0;
										foreach($cum_a_sql as $caas){
											$gallcount = $gallcount + $caas->count;
										}
										if ( $gallcount > 0 ) {
											$gqscore = number_format( $gqscore / $gallcount, $atts[ 'decimal' ], '.', '' );
										}
										else {
											$gqscore = 0;
										}
									 }
									 if ( isset( $key1 ) && ! empty( $qscore ) && ! empty( $titles[ $key1 ] ) ) {
										$sdatas[ 0 ][ $key1 ] = array( 'answer' => $titles[ $key1 ], 'count'=> $qscore );
									 }
									if ( $args[ 'compare' ] == "true" ) {
										$sdatas[ 0 ][ $key1 ][ 'gcount' ] = $gqscore;
									}
								}
							}
						}
					}
				}
			}
			if ( ! empty( $answercats ) && ( $args[ 'data' ] == 'score' || $args[ 'data' ] == 'average-score' || $args[ 'data' ] == 'rating' ) ) {
				foreach( $answercats as $ackey=>$ac ) {
					if ( ! empty( $ackey ) && ! in_array( $ackey, $already_added ) ) {
						if ( $args[ 'data' ] == 'average-score' ) {
							if ( $answercats_counts[ $ackey ] > 0 ) {
								$sdatas[ 0 ][] = array( 'answer' => $ackey, 'count'=> round( $ac / $answercats_counts[ $ackey ], 2 ) );
								$already_added [] = $ackey;
							}
						}
						else {
							$sdatas[ 0 ][] = array( 'answer' => $ackey, 'count'=> $ac );
							$already_added [] = $ackey;
					}
					}
				}
			}
			if ( $args[ 'data' ] == "score" || $args[ 'data' ] == "average-score" ) {
				if ( $args[ 'sort' ] == "asc" ) {
					usort( $sdatas[ 0 ], function ( $item1, $item2 ) {
						if ( $item1[ 'count' ] == $item2[ 'count' ] ) return 0;
						return $item1[ 'count' ] < $item2[ 'count' ] ? -1 : 1;
					});
				}
				if ( $args[ 'sort' ] == "desc" ) {
					usort( $sdatas[ 0 ], function ( $item1, $item2 ) {
						if ( $item1[ 'count' ] == $item2[ 'count' ] ) return 0;
						return $item1[ 'count' ] < $item2[ 'count' ] ? -1 : 1;
					});
					$sdatas[ 0 ] = array_reverse( $sdatas[ 0 ] );
				}
			}
			if ( $args[ 'filter' ] != '' ) {
				$sdatas = wp_sap::filter_result( $args[ 'filter' ], $sdatas );
			}
			// start - extension to display top results only
			if ( is_numeric( $args[ 'top' ] ) && ( $args[ 'data' ] == "score" || $args[ 'data' ] == "average-score" ) ) {
				usort( $sdatas[ 0 ], function ( $item1, $item2 ) {
					if ( $item1[ 'count' ] == $item2[ 'count' ] ) return 0;
					return $item1[ 'count' ] < $item2[ 'count' ] ? -1 : 1;
				});
				$sdatas[ 0 ] = array_slice( array_reverse( $sdatas[ 0 ] ), 0, $args[ 'top' ] );
			}
			// end - extension to display top results only
			// start - extension to display percentages instead of scores or votes
			if ( $args[ 'percentage' ] == "true" && ( $args[ 'data' ] == "score" || $args[ 'data' ] == "average-score" ) ) {
				$tsumscore = 0;
				foreach( $sdatas[ 0 ] as $sd ) {
					$tsumscore += $sd[ 'count' ];
				}
				if ( strpos( $args[ 'catmax' ], ',' ) !== false) {
					$args[ 'catmax' ] = explode( ",", $args[ 'catmax' ] );
				}
				foreach( $sdatas[ 0 ] as $sdkey=>$sd ) {
					$thispercentage = 0;
					if ( $sd[ 'count' ] > 0 ) {
						if ( $args[ 'catmax' ] == 'false' ) {
							$thispercentage = round( ( ( $sd[ 'count' ] / $tsumscore ) * 100 ), 2 );
						}
						else {
							if ( is_numeric( $args[ 'catmax' ] ) ) {
								$thispercentage = round( ( ( $sd[ 'count' ] / $args[ 'catmax' ]  ) * 100 ), 2 );
							}
							if ( is_array( $args[ 'catmax' ] ) ) {
								if ( is_numeric( $args[ 'catmax' ][ $sdkey ] ) ) {
									$thispercentage = round( ( ( $sd[ 'count' ] / $args[ 'catmax' ][ $sdkey ] ) * 100 ), 2 );
								}
							}
						}
					}
					$sdatas[ 0 ][ $sdkey ][ 'count' ] = $thispercentage;
				}
			}
			if ( $args[ 'percentage' ] == "true" && $args[ 'data' ] == "question" ) {
				$tqallvotes = 0;
				foreach( $sdatas as $sdkey=>$sd ) {
					foreach( $sd as $sdkey2=>$sditem ) {
						$tqallvotes += $sditem[ "count" ];
					}
				}
				if ( is_array( $sdatas ) ) {
					foreach( $sdatas as $sdkey=>$sd ) {
						foreach( $sd as $sdkey2=>$sditem ) {
							$sdatas[ $sdkey ][ $sdkey2 ][ "count" ] = round( ( ( $sditem[ 'count' ] / $tqallvotes ) * 100 ), 2 );
						}
					}
				}
			}
			
			if ( $args[ 'uid' ] != "false" && $args[ 'data' ] == "average-score" ) {
				foreach( $sdatas[ 0 ] as $sdkey=>$sd ) {
					if ( isset( $cat_count[ $sd[ 'answer' ] ] ) && $cat_count[ $sd[ 'answer' ] ] > 0 ) {
						$thisavg = round( ( $sd[ 'count' ] / $cat_count[ $sd[ 'answer' ] ] ), 2 );
						$sdatas[ 0 ][ $sdkey ][ 'count' ] = $thisavg;
					}
				}
			}
			// end - extension to display percentages instead of scores or votes
			if ( $atts[ 'pure' ] == "true" && $style != "plain" ) {
				if ( $atts[ 'data' ] == "score" && empty( $answercats ) ) {
					return false;
				}
				else {
					return $sdatas;
				}
			}
			$wpsap_answer_array[ $args['id'] . '-' . $unique_key ] = array( "style" => array( "style" => $args[ 'style' ], "max" => $args[ 'max' ], "bgcolor" => $args[ 'bgcolor' ], "cbgcolor" => $args[ 'cbgcolor' ], "percentage" => $args[ 'percentage' ], "after" => $args[ 'after' ], "legend" => $args[ 'legend' ] ), "datas" => $sdatas );
			if ( $args[ 'compare' ] == "true" ) {
				$wpsap_answer_array[ $args['id'] . '-' . $unique_key ][ "style" ][ "lng" ] = array( "label1" => esc_html__( 'Personal: ', WP_SAP_TEXT_DOMAIN ), "label2" => esc_html__( 'Average: ', WP_SAP_TEXT_DOMAIN ) );
			}
			else {
				$wpsap_answer_array[ $args['id'] . '-' . $unique_key ][ "style" ][ "lng" ] = array( "label1" => "", "label2" => "" );
			}
			if ( $args[ 'data' ] != 'full-records' ) {
				$result .= '</div>';
			}
			if ( isset( $_REQUEST[ 'sspcmd' ] ) && $_REQUEST[ 'sspcmd' ] == "displaychart" ) {
				$result .= "|endcontent-params|" . json_encode( $wpsap_answer_array[ $args['id'] . '-' . $unique_key ] );
			}
			if ( $atts[ 'init' ] == "true" ) {
				$this->wp_sap_initplugin();
			}
			return( $result );
		}

		public function wpsap_shortcodes( $atts ) {
			global $wpdb;
			extract( shortcode_atts( array(
				'id' => '-1',
				'style' => 'modal',
				'width' => '',
				'align' => 'left'
				), $atts, 'survey' ) );
				if ( ! isset( $atts[ 'style' ] ) ) {
					$atts[ 'style' ] = 'modal';
				}
				if ( ! isset( $atts[ 'align' ] ) ) {
					$atts[ 'align' ] = '';
				}
				if ( ! isset( $atts[ 'width' ] ) ) {
					$atts[ 'width' ] = '98%';
				}
				$args = array( 'id' => $atts[ 'id' ], 'style' => $atts[ 'style' ], 'align' => $atts[ 'align' ], 'width' => $atts[ 'width' ] );
				if ( ! is_single() && ! is_page() ) {
					return('');
				}
				wp_register_script( 'wp_sap_script', plugins_url( '/templates/assets/js/wp_sap.js', __FILE__ ), array( 'jquery' ), '1.0.0.1', true );
				$sql = "SELECT *,msq.id as question_id FROM " . $wpdb->prefix . "wp_sap_surveys mss LEFT JOIN " . $wpdb->prefix . "wp_sap_questions msq on mss.id = msq.survey_id WHERE (`expiry_time`>'" . current_time( 'mysql' ) . "' OR `expiry_time`='0000-00-00 00:00:00') AND (`start_time`<'" . current_time( 'mysql' ) . "' OR `start_time`='0000-00-00 00:00:00') AND mss.id='" . $args[ 'id' ] . "' ORDER BY msq.id ASC";
				$questions_sql = $wpdb->get_results( $sql );
				if ( ! empty( $questions_sql ) ) {
					$survey = array();
					foreach( $questions_sql as $key=>$qs ) {
						if ( $key == 0 ) {
							$survey[ 'options' ] = stripslashes( str_replace( '\\\'', '|', $qs->options ) );
							$survey[ 'plugin_url' ] = plugins_url( '', __FILE__ );
							$survey[ 'admin_url' ] = admin_url( 'admin-ajax.php' );
							$survey[ 'survey_id' ] = $qs->survey_id;
							$survey[ 'align' ] = $args[ 'align' ];
							$survey[ 'width' ] = $args[ 'width' ];
							$survey[ 'style' ] = $args[ 'style' ];
							if ( $sv_condition != "expired" ) {
								$survey[ 'expired' ] = 'false';
							}
							else {
								$survey[ 'expired' ] = 'true';
							}
						}
						$survey[ 'questions' ][ $key ][] = $qs->question;
						$sql = "SELECT * FROM " . $wpdb->prefix . "wp_sap_answers WHERE survey_id = '" . $qs->survey_id . "' AND question_id = '" . $qs->question_id . "' ORDER BY autoid ASC";
						$answers_sql = $wpdb->get_results( $sql );
						foreach( $answers_sql as $key2=>$as ) {
							$survey[ 'questions' ][ $key ][] = $as->answer;
						}
					}
					wp_localize_script( 'wp_sap_script', 'sss_params', array( 'survey_options'=>json_encode( $survey ) ) );
					wp_enqueue_script( 'wp_sap_script' );
					if ( $args[ 'style' ] == 'flat' ) {
						return( '<div id="survey" style="width:100%;"></div>' );
					}
				}
		}
			
		function enqueue_custom_scripts_and_styles() {
			global $wpdb;
			wp_enqueue_style( 'wp_sap_style', plugins_url( '/templates/assets/css/wp_sap.css', __FILE__ ) );
			wp_enqueue_style( 'jquery_ui_style', plugins_url( '/templates/assets/css/jquery-ui.css', __FILE__ ) );
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-ui-core', array( 'jquery' ) );
			wp_enqueue_script( 'jquery-effects-core', array( 'jquery' ) );
			wp_enqueue_script( 'jquery-effects-slide', array( 'jquery-effects-core' ) );
			wp_enqueue_script( 'jquery-visible',plugins_url( '/templates/assets/js/jquery.visible.min.js', __FILE__ ), array( 'jquery' ), '1.10.2' );
			wp_enqueue_script( 'chartjs', plugins_url( '/templates/assets/js/Chart.min.js', __FILE__ ), array( 'jquery' ), '1.10.3' );
			wp_enqueue_script( 'wp_sap_answer_script',plugins_url('/templates/assets/js/wp_sap_answer.js', __FILE__ ), array( 'jquery', 'chartjs' ), WPSAP_SURVEY_VERSION, true);
			wp_register_script('wp_sap_script', plugins_url( '/templates/assets/js/wp_sap.js' , __FILE__ ), array( 'jquery' ), WPSAP_SURVEY_VERSION, true );
				$survey_viewed = array();
				$sv = '';
				$sv_condition = '';
				$cookie_wpsap = array();
				if ( isset( $_COOKIE[ 'wp_sap' ] ) ) {
					$cookie_wpsap = json_decode( stripslashes( $_COOKIE[ 'wp_sap' ] ) );
				}
				$illegal_char = false;
				if ( is_array( $cookie_wpsap ) ) {
					foreach( $cookie_wpsap as $cwp ) {
						if( preg_match( '/[^A-Za-z0-9]/', $cwp ) ) {
							$illegal_char = true;
						}
					}
					if ( isset( $_COOKIE[ 'wp_sap' ] ) && ! $illegal_char ) {
						$survey_viewed = json_decode( stripslashes( $_COOKIE[ 'wp_sap' ] ) );
					}
				}
				if ( ! empty( $survey_viewed ) ) {
					$sv = implode( $survey_viewed );
					$sv_condition = "AND (mss.id NOT IN ('" . $sv . "'))";
				}
			$sql = "SELECT *,msq.id as question_id FROM " . $wpdb->prefix . "wp_sap_surveys mss LEFT JOIN " . $wpdb->prefix . "wp_sap_questions msq on mss.id = msq.survey_id WHERE global = 1 AND (`expiry_time`>'" . current_time( 'mysql' ) . "' OR `expiry_time`='0000-00-00 00:00:00') AND (`start_time`<'" . current_time( 'mysql' ) . "' OR `start_time`='0000-00-00 00:00:00') " . $sv_condition . " ORDER BY msq.id ASC";
			$questions_sql = $wpdb->get_results( $sql );
			if ( ! empty( $questions_sql ) ) {
			$survey = array();
			foreach( $questions_sql as $key=>$qs ) {
				if ( $key == 0 ) {
					$survey[ 'options' ] = stripslashes( str_replace( '\\\'', '|', $qs->options ) );
					$survey[ 'plugin_url' ] = plugins_url( '', __FILE__ );
					$survey[ 'admin_url' ] = admin_url( 'admin-ajax.php' );
					$survey[ 'survey_id' ] = $qs->survey_id;
					$survey[ 'style' ] = 'modal';
					$survey[ 'expired' ] = 'false';
					$survey[ 'debug' ] = 'true';
				}
				$survey[ 'questions' ][ $key ][] = $qs->question;
							$sql = "SELECT * FROM " . $wpdb->prefix . "wp_sap_answers WHERE survey_id = '" . $qs->survey_id . "' AND question_id = '" . $qs->question_id . "' ORDER BY autoid ASC";
							$answers_sql = $wpdb->get_results($sql);
							foreach( $answers_sql as $key2=>$as ) {
								$survey[ 'questions' ][ $key ][] = $as->answer;
							}
			}
			wp_localize_script( 'wp_sap_script', 'sss_params', array( 'survey_options' => json_encode( $survey ) ) );
			wp_enqueue_script( 'wp_sap_script' );
			}
		}
		/**
		* Add the settings link to the plugins page
		**/
		function plugin_settings_link( $links ) { 
			$links[ 'settings' ] = '<a href="options-general.php?page=wp_sap">' . __( 'Settings', 'pantherius-wordpress-survey-polls' ) . '</a>';
			$links[ 'pro' ] = '<a target="_blank" href="https://modalsurvey.com">Modal Survey PRO VERSION</a>';
			return $links;
		}
		
		function wp_sap_initplugin() {
		global $wpsap_answer_array, $script;
			if ( $this->wpsappreinit == "false" ) {
				$this->wpsappreinit = "true";
				if ( ! empty( $script ) ) {
					echo esc_js( $script );
				}
				if ( ! empty( $wpsap_answer_array ) ) {
					wp_register_script( 'wsap_answer_script_init', plugins_url( '/templates/assets/js/wp_sap_answer_init.js', __FILE__ ), array( 'jquery' ), WPSAP_SURVEY_VERSION, true );
					wp_localize_script( 'wsap_answer_script_init', 'wpsap_answer_init_params', $wpsap_answer_array );
					wp_enqueue_script( 'wsap_answer_script_init' );			
					do_action( 'wsap_action_answer_init', $wpsap_answer_array );
				}
			}
		}

	}
}
if( class_exists( 'wp_sap' ) ) {
	// call the main class
	$wp_sap = wp_sap::getInstance();
}
?>