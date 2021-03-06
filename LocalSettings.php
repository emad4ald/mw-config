<?php
/*
 * LocalSettings.php for Miraheze.
 * Authors of initial version: Southparkfan, John Lewis, Orain contributors
 */

// Initialise WikiInitialise
require_once( '/srv/mediawiki/w/extensions/CreateWiki/includes/WikiInitialise.php' );
$wi = new WikiInitialise();

// Load PrivateSettings (e.g. wgDBpassword)
require_once( '/srv/mediawiki/config/PrivateSettings.php' );

// Load global skins and extensions
require_once( '/srv/mediawiki/config/GlobalSkins.php' );
require_once( '/srv/mediawiki/config/GlobalExtensions.php' );

// Don't allow web access.
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

$wmgUploadHostname = "static.miraheze.org";

$wi->config->settings = [
	// invalidates user sessions - do not change unless it is an emergency.
	'wgAuthenticationTokenVersion' => [
		'default' => '4',
	],

	// AbuseFilter
	'wgAbuseFilterActions' => [
		'default' => [
			'block' => true,
			'blockautopromote' => true,
			'degroup' => true,
			'disallow' => true,
			'rangeblock' => false,
			'tag' => true,
			'throttle' => true,
			'warn' => true,
		],
	],
	'wgAbuseFilterCentralDB' => [
		'default' => 'metawiki',
	],
	'wgAbuseFilterIsCentral' => [
		'default' => false,
		'metawiki' => true,
	],
	'wgAbuseFilterBlockDuration' => [
		'default' => 'indefinte',
	],
	'wgAbuseFilterAnonBlockDuration' => [
		'default' => 2592000,
	],
	'wgAbuseFilterRestrictions' => [
		'default' => [
			'blockautopromote' => true,
			'block' => true,
			'degroup' => true,
			'rangeblock' => true,
		],
	],
	'wgAbuseFilterNotifications' => [
		'default' => 'udp',
	],
	'wgAbuseFilterLogPrivateDetailsAccess' => [
		'default' => true,
	],
	'wgAbuseFilterPrivateDetailsForceReason' => [
		'default' => true,
	],

	// Anti-spam
	'wgAccountCreationThrottle' => [
		'default' => 5,
	],
	// https://www.mediawiki.org/wiki/Extension:SpamBlacklist#Blacklist_syntax
	'wgBlacklistSettings' => [
		'default' => [
			'spam' => [
				'files' => [
					'https://meta.miraheze.org/w/index.php?title=Spam_blacklist&action=raw&sb_ver=1',
				],
			],
		],
	],
	'wgLogSpamBlacklistHits' => [
		'default' => false,
		'metawiki' => true,
	],
	'wgTitleBlacklistLogHits' => [
		'default' => false,
		'loginwiki' => true,
		'metawiki' => true,
	],

	// Cargo
	'wgCargoGoogleMapsKey' => [
		'default' => $wmgMapsGMaps3ApiKey
	],

	// PageForms
	'wgPageFormsGoogleMapsKey' => [
		'default' => $wmgMapsGMaps3ApiKey
	],

	// BetaFeatures
	'wgMediaViewerIsInBeta' => [
		'default' => false,
	],
	'wgVisualEditorEnableWikitextBetaFeature' => [
		'default' => false,
	],
	'wgVisualEditorEnableDiffPageBetaFeature' => [
		'default' => false,
	],
	'wgPivotFeatures' => [
		'default' => [
			'showActionsForAnon' => true,
			'fixedNavBar' => false,
			'usePivotTabs' => false,
			'showHelpUnderTools' => true,
			'showRecentChangesUnderTools' => true,
			'wikiName' => $wgSitename,
			'wikiNameDesktop' => $wgSitename,
			'navbarIcon' => false,
			'preloadFontAwesome' => false,
			'showFooterIcons' => true,
			'addThisPUBID' => '',
			'useAddThisShare' => '',
			'useAddThisFollow' => ''
		],
		'+thegreatwarwiki' => [
			'showActionsForAnon' => true,
			'fixedNavBar' => true,
			'usePivotTabs' => true,
			'showHelpUnderTools' => false,
			'showRecentChangesUnderTools' => false,
			'wikiName' => $wgSitename,
			'wikiNameDesktop' => 'The Great War 1914-1918',
			'navbarIcon' => false,
			'preloadFontAwesome' => false,
			'showFooterIcons' => true,
			'addThisPUBID' => '',
			'useAddThisShare' => '',
			'useAddThisFollow' => ''
		],
	],

	// Block
	'wgAutoblockExpiry' => [
		'default' => 86400, // 24 hours * 60 minutes * 60 seconds
	],
	'wgBlockAllowsUTEdit' => [
		'default' => true,
	],
	'wgEnableBlockNoticeStats' => [
		'default' => false,
	],
	'wgEnablePartialBlocks' => [
		'default' => true,
	],

	// Bot passwords
	'wgBotPasswordsDatabase' => [
		'default' => 'mhglobal',
	],

	// Cache
	'wgCacheDirectory' => [
		'default' => '/srv/mediawiki/w/cache',
	],
	'wgLocalisationCacheConf' => [
		'default' => [
			'class' => 'LocalisationCache',
			'store' => 'files',
			'storeDirectory' => "$IP/cache/l10n",
			'manualRecache' => true,
		],
	],
	'wgExtensionEntryPointListFiles' =>  [
		'default' => [
			'/srv/mediawiki/config/extension-list'
		],
	],
	'wgPreprocessorCacheThreshold' => [
		'default' => false,
	],
	'wgResourceLoaderMaxage' => [
		'default' => [
			'versioned' => 12 * 60 * 60,
			'unversioned' => 5 * 60,
		],
	],
	'wgRevisionCacheExpiry' => [
		'default' => 0,
	],
	'wgEnableSidebarCache' => [
		'default' => false,
	],
	
	// Category Collation
	'wgCategoryCollation' => [ // updateCollation.php should be ran after the change 
		'default' => 'uppercase',
		'holidayswiki' => 'numeric',
	],
	// Cosmos settings
	'wgCosmosBannerLogo' => [
		'default' => null,
	],
	'wgCosmosWikiHeaderWordmark' => [
		'default' => null,
	],
	'wgCosmosWikiHeaderWordmark' => [
		'default' => null,
	],
	'wgCosmosBackgroundImage' => [
		'default' => null,
	],
	'wgCosmosBackgroundImageSize' => [
		'default' => 'cover',
	],
	'wgCosmosMainBackgroundColor' => [
		'default' => '#1A1A1A',
	],
	'wgCosmosContentBackgroundColor' => [
		'default' => '#ffffff',
	],
	'wgCosmosBannerBackgroundColor' => [
		'default' => '#c0c0c0',
	],
	'wgCosmosWikiHeaderBackgroundColor' => [
		'default' => '#c0c0c0',
	],
	'wgCosmosLinkColor' => [
		'default' => '#0645ad',
	],
	'wgCosmosButtonColor' => [
		'default' => '#c0c0c0',
	],
	'wgCosmosToolbarColor' => [
		'default' => '#000000',
	],
	'wgCosmosFooterColor' => [
		'default' => '#c0c0c0',
	],
	'wgCosmosEnablePortableInfoboxEuropaTheme' => [
		'default' => true,
	],
	'wgCosmosBackgroundImageNorepeat' => [
		'default' => true,
	],
	'wgCosmosBackgroundImageFixed' => [
		'default' => true,
	],
	'wgCosmosUseMessageforToolbar' => [
		'default' => false,
	],
	'wgCosmosSocialProfileModernTabs' => [
		'default' => true,
	],
	'wgCosmosSocialProfileRoundAvatar' => [
		'default' => true,
	],
	'wgCosmosSocialProfileShowEditCount' => [
		'default' => true,
	],
	'wgCosmosSocialProfileAllowBio' => [
		'default' => true,
	],
	'wgCosmosSocialProfileShowGroupTags' => [
		'default' => true,
	],
	'wgCosmosUseSocialProfileAvatar' => [
		'default' => true,
	],
	'wgCosmosProfileTagGroups' => [
		'default' => [
			'bureaucrat',
			'bot',
			'sysop',
			'interface-admin'
		],
	],
	'wgCosmosNumberofGroupTags' => [
		'default' => 2,
	],
	'wgCosmosContentOpacityLevel' => [
		'default' => 100,
	],
	
	// CategoryTree
	'wgCategoryTreeDefaultMode' => [
		'default' => 0,
	],
	'wgCategoryTreeCategoryPageMode' => [
		'default' => 0,
	],

	// CentralNotice
	'wgNoticeInfrastructure' => [
		'default' => false,
		'metawiki' => true,
	],
	'wgCentralSelectedBannerDispatcher' => [
		'default' => "https://meta.miraheze.org/w/index.php/Special:BannerLoader",
	],
	'wgCentralBannerRecorder' => [
		'default' => "https://meta.miraheze.org/w/index.php/Special:RecordImpression",
	],
	'wgCentralDBname' => [
		'default' => 'metawiki',
	],
	'wgCentralHost' => [
		'default' => "https://meta.miraheze.org",
	],
	'wgNoticeProject' => [
		'default' => 'all',
	],
	'wgNoticeProjects' => [
		'default' => [
			'all',
			'optout',
		],
	],
	'wgNoticeUseTranslateExtension' => [
		'default' => true,
	],

	// Captcha
	'wgCaptchaClass' => [
		'default' => 'ReCaptchaNoCaptcha',
	],
	'wgReCaptchaSendRemoteIP' => [
		'default' => false,
	],

	// Category
	'wgUseCategoryBrowser' => [
		'default' => false,
	],

	'wgCategoryPagingLimit' => [
		'default' => 200,
		'nenawikiwiki' => 1500,
	],

	// CentralAuth
	'wgCentralAuthAutoCreateWikis' => [
		'default' => [ 
			'loginwiki', 
			'metawiki' 
		],
	],
	'wgCentralAuthAutoNew' => [
		'default' => true,
	],
	'wgCentralAuthAutoMigrate' => [
		'default' => true,
	],
	'wgCentralAuthAutoMigrateNonGlobalAccounts' => [
		'default' => true,
	],
	'wgCentralAuthCookies' => [
		'default' => true,
	],
	'wgCentralAuthCookieDomain' => [
		'default' => '.miraheze.org',
	],
	'wgCentralAuthCreateOnView' => [
		'default' => true,
		'cwarswiki' => false,
		'nenawikiwiki' => false,
	],
	'wgCentralAuthDatabase' => [
		'default' => 'mhglobal',
	],
	'wgCentralAuthEnableGlobalRenameRequest' => [
		'default' => false,
		'metawiki' => true,
	],
	'wgCentralAuthEnableUserMerge' => [
		'default' => false,
		'metawiki' => true,
	],
	'wgCentralAuthLoginWiki' => [
		'default' => 'loginwiki',
	],
	'wgCentralAuthPreventUnattached' => [
		'default' => true,
	],
	'wgCentralAuthSilentLogin' => [
		'default' => true,
	],

	// CheckUser
	'wgCheckUserForceSummary' => [
		'default' => true,
	],

	// Comments extension
	'wgCommentsDefaultAvatar' => [
		'default' => '/w/extensions/SocialProfile/avatars/default_ml.gif',
	],

	'wgCommentsInRecentChanges' => [
		'default' => false,
	],

	'wgCommentsSortDescending' => [
		'default' => false,
	],

	// CommentStreams extension
	'wgCommentStreamsEnableTalk' => [
		'default' => false,
	],
	'wgCommentStreamsNewestStreamsOnTop' => [
		'default' => false,
	],
	'wgCommentStreamsUserAvatarPropertyName' => [
		'default' => null,
	],
	'wgCommentStreamsEnableVoting' => [
		'default' => false,
	],
	'wgCommentStreamsModeratorFastDelete' => [
		'default' => false,
	],

	 // Contribution Scores
	 'wgContribScoreDisableCache' => [
		 'default' => true,
	 ],

	// Cookies
	'wgCookieDomain' => [
		'default' => '.miraheze.org'
	],
	'wgCookieSameSite' => [
		'default' => 'None'
	],
	'wgUseSameSiteLegacyCookies' => [
		'default' => true
	],

	// CreateWiki
	'wgCreateWikiBlacklistedSubdomains' => [
		'default' => '/^(subdomain|noc|sandbox\d{1,2}|outreach|gazetteer|wikitech|wiki|www|wikis|misc\d{1,2}|db\d{1,2}|cp\d{1,2}|mw\d{1,2}|jobrunner\d{1,2}|gluster\d{1,2}|ns\d{1,2}|bacula\d{1,2}|misc\d{1,2}|mail\d{1,2}|mw\d{1,2}|ldap\d{1,2}|cloud\d{1,2}|mon\d{1,2}|lizardfs\d{1,2}|rdb\d{1,2}|phab\d{1,2}|services\d{1,2}|puppet\d{1,2}|test\d{1,2})+$/',
	],
	'wgCreateWikiCustomDomainPage' => [
		'default' => 'Special:MyLanguage/Custom_domains',
	],
	'wgCreateWikiDatabase' => [
		'default' => 'mhglobal',
	],
	'wgCreateWikiDatabaseClusters' => [
		'default' => [
			'c2',
			'c3'
		]
	],
	'wgCreateWikiGlobalWiki' => [
		'default' => 'metawiki',
	],
	'wgCreateWikiDBDirectory' => [
		'default' => '/srv/mediawiki/dblist',
	],
	'wgCreateWikiEmailNotifications' => [
		'default' => true,
	],
	'wgCreateWikiNotificationEmail' => [
		'default' => 'tech@miraheze.org',
	],
	'wgCreateWikiSQLfiles' => [
		'default' => [
			"$IP/maintenance/tables.sql",
			"$IP/maintenance/tables-generated.sql",
			"$IP/extensions/AbuseFilter/abusefilter.tables.sql",
			"$IP/extensions/AntiSpoof/sql/patch-antispoof.mysql.sql",
			"$IP/extensions/BetaFeatures/sql/create_counts.sql",
			"$IP/extensions/CheckUser/cu_log.sql",
			"$IP/extensions/CheckUser/cu_changes.sql",
			"$IP/extensions/DataDump/sql/data_dump.sql",
			"$IP/extensions/Echo/echo.sql",
			"$IP/extensions/GlobalBlocking/sql/global_block_whitelist.sql",
			"$IP/extensions/GlobalBlocking/sql/globalblocks.sql",
			"$IP/extensions/OAuth/schema/OAuth.sql",
			"$IP/extensions/RottenLinks/sql/rottenlinks.sql",
			"$IP/extensions/UrlShortener/schemas/urlshortcodes.sql"
		],
	],
	'wgCreateWikiStateDays' => [
		'default' => [
			'inactive' => 45,
			'closed' => 15,
			'removed' => 120,
			'deleted' => 14
		],
	],
	'wgCreateWikiCacheDirectory' => [
		'default' => '/srv/mediawiki/w/cache'
	],
	'wgCreateWikiCategories' => [
		'default' => [
			'Automotive' => 'automotive',
			'Community' => 'community',
			'Education' => 'education',
			'Electronics' => 'electronics',
			'Entertainment' => 'entertainment',
			'Fandom' => 'fandom',
			'Fantasy' => 'fantasy',
			'Gaming' => 'gaming',
			'Geography' => 'geography',
			'History' => 'history',
			'Humour/Satire' => 'humour',
			'Language/Linguistics' => 'langling',
			'Leisure' => 'leisure',
			'Literature/Writing' => 'literature',
			'Media/Journalism' => 'media',
			'Medicine/Medical' => 'medical',
			'Military/War' => 'military',
			'Music' => 'music',
			'Podcast' => 'podcast',
			'Politics' => 'politics',
			'Private' => 'private',
			'Religion' => 'religion',
			'Software/Computing' => 'software',
			'Sports' => 'sport',
			'Uncategorised' => 'uncategorised',
		],
	],
	'wgCreateWikiUseCategories' => [
		'default' => true,
	],
	'wgCreateWikiSubdomain' => [
		'default' => 'miraheze.org',
	],
	'wgCreateWikiUseClosedWikis' => [
		'default' => true,
	],
	'wgCreateWikiUseCustomDomains' => [
		'default' => true,
	],
	'wgCreateWikiUseEchoNotifications' => [
		'default' => true,
	],
	'wgCreateWikiUseInactiveWikis' => [
		'default' => true,
	],
	'wgCreateWikiUsePrivateWikis' => [
		'default' => true,
	],
	
	'wgCreateWikiUseJobQueue' => [
		'default' => true,
	],

	// Cookies extension settings
	'wgCookieWarningMoreUrl' => [
		'default' => 'https://meta.miraheze.org/wiki/Privacy_Policy#4._Cookies',
	],
	'wgCookieSetOnAutoblock' => [
		'default' => true,
	],
	// Cookies extension settings
	'wgCookieWarningEnabled' => [
		'default' => true,
	],
	'wgCookieWarningGeoIPLookup' => [
		'default' => 'php',
	],
	'wgCookieWarningGeoIp2' => [
		'default' => true,
	],
	'wgCookieWarningGeoIp2Path' => [
		'default' => '/srv/GeoLite2-City.mmdb',
	],

	// Cookie stuff
	'wgCookieSetOnIpBlock' => [
		'default' => true,
	],

	// Database
	'wgAllowSchemaUpdates' => [
		'default' => false,
	],
	'wgCompressRevisions' => [
		'default' => false,
		'allthetropeswiki' => true,
		'altversewiki' => true,
		'americangirldollswiki' => true,
		'animebathswiki' => true,
		'beidipediawiki' => true,
		'buswiki' => true,
		'commonwealthwiki' => true,
		'crappygameswiki' => true,
		'cwarswiki' => true,
		'drawnfeetwiki' => true,
		'evilbabeswiki' => true,
		'incubatorwiki' => true,
		'libertygamewiki' => true,
		'metawiki' => true,
		'nonciclopediawiki' => true,
		'onepiecewiki' => true,
		'openhatchwiki' => true,
		'quircwiki' => true,
		'ranchstorywiki' => true,
		'simswiki' => true,
		'thelastsovereignwiki' => true,
		'tmewiki' => true,
		'toxicfandomsandhatedomswiki' => true, // locked wiki
		'uncyclomirrorwiki' => true,
		'ungamewiki' => true,
	],
	'wgDBadminuser' => [
		'default' => 'wikiadmin',
	],
	'wgDBuser' => [
		'default' => 'mediawiki',
	],

	'wgReadOnly' => [
		'default' => false,
	],
	'wgSharedDB' => [
		'default' => 'metawiki',
	],
	'wgSharedTables' => [
		'default' => [],
	],
	'wgActorTableSchemaMigrationStage' => [
		'default' => SCHEMA_COMPAT_NEW,
	],

	'wgCommentTableSchemaMigrationStage' => [
		'default' => MIGRATION_NEW,
	],

	//CommonsMetadata
	'wgCommonsMetadataForceRecalculate' => [
		'default' => false,
	],

	// Delete
	'wgDeleteRevisionsLimit' => [
		'default' => '1000', // databases don't have much memory - let's not overload them in future - set to 1k T5287
	],

	// DJVU
	'wgDjvuDump' => [
		'default' => '/usr/bin/djvudump',
	],
	'wgDjvuRenderer' => [
		'default' => '/usr/bin/ddjvu',
	],
	'wgDjvuTxt' => [
		'default' => '/usr/bin/djvutxt',
	],

	// TimedMediaHandler config
	'wgFFmpegLocation' => [
		'default' => '/usr/bin/ffmpeg',
	],
	'wgTmhEnableMp4Uploads' => [
		'default' => false,
		'dcmultiversewiki' => true,
	],

	// Discord
	'wgDiscordNotificationBlockedUser' => [
		'default' => true,
	],
	'wgDiscordNotificationNewUser' => [
		'default' => true,
	],
	'wgDiscordShowNewUserFullName' => [
		'default' => false,
	],

	// Display Title
	'wgDisplayTitleHideSubtitle' => [
		'default' => false,
	],

	// Download from https://www.stopforumspam.com/downloads (recommended listed_ip_30_all.zip)
	// for ipv4 + ipv6 combined.
	// TODO: Setup cron to update this automatically.
	'wgSFSIPListLocation' => [
		'default' => '/mnt/mediawiki-static/private/stopforumspam/listed_ip_30_ipv46_all.txt',
	],

	// ParserFunctions
	'wgPFEnableStringFunctions' => [
		'default' => false,
	],
	'wgAllowSlowParserFunctions' => [
		'default' => false,
	],

	// Echo
	'wgEchoCrossWikiNotifications' => [
		'default' => true,
	],
	'wgEchoUseJobQueue' => [
		'default' => true,
	],
	'wgEchoSharedTrackingCluster' => [
		'default' => 'echo',
	],
	'wgEchoSharedTrackingDB' => [
		'default' => 'metawiki',
	],
	'wgEchoUseCrossWikiBetaFeature' => [
		'default' => true,
	],
	'wgEchoMentionStatusNotifications' => [
		'default' => true,
	],

	// Exempt from Robot Control (INDEX/NOINDEX namespaces)
	'wgExemptFromUserRobotsControl' => [
		'default' => $wgContentNamespaces,
		'thelonsdalebattalionwiki' => [],
	],

	// ElasticSearch
	'wmgDisableSearchUpdate' => [
		'default' => false,
	],
	'wmgSearchType' => [
		'default' => false,
	],

	'wmgShowPopupsByDefault' => [
		'default' => false,
	],

	// Preloader
	'wgPreloaderSource' => [
		'default' => [
 			0 => 'Template:Boilerplate',
 		],
 	],

	// Extensions and Skins
	'wmgUse3D' => [
		'default' => false,
	],
	'wmgUseAddThis' => [
		'default' => false,
	],
	'wmgUseAddHTMLMetaAndTitle' => [
		'default' => false,
	],
	'wmgUseAdminLinks' => [
		'default' => false,
	],
	'wmgUseAdvancedSearch' => [
		'default' => false,
	],
	'wmgUseAJAXPoll' => [
		'default' => false,
	],
	'wmgUseApex' => [
		'default' => false,
	],
	'wmgUseApprovedRevs' => [
		'default' => false,
	],
	'wmgUseArrays' => [
		'default' => false,
	],
	'wmgUseArticleRatings' => [
		'default' => false,
	],
	'wmgUseArticleToCategory2' => [
		'default' => false,
	],
	'wmgUseAuthorProtect' => [
		'default' => false,
	],
	'wmgUseAutoCreateCategoryPages' => [
		'default' => false, // DO NOT enable on wikis that have more than 500 categories. See T1230
	],
	'wmgUseAutoCreatePage' => [
		'default' => false,
	],
	'wmgUseBlogPage' => [
		'default' => false,
	],
	'wmgUseBabel' => [
		'default' => false,
	],
	'wmgUseBootstrap' => [
		'default' => false,
	],
	'wmgUseMSCalendar' => [
		'default' => false,
	],
	// Must be on at all times except for ldapwikiwiki
	'wmgUseCentralAuth' => [
		'default' => true,
		'ldapwikiwiki' => false,
	],
	'wmgUseCapiunto' => [
		'default' => false,
	],
	'wmgUseCargo' => [
		'default' => false,
	],
	'wmgUseCategorySortHeaders' => [
		'default' => false,
	],
	'wmgUseCategoryTree' => [
		'default' => false,
	],
	'wmgUseCharInsert' => [
		'default' => false,
	],
	'wmgUseCirrusSearch' => [
		'default' => false,
	],
	'wmgUseCite' => [
		'default' => false,
	],
	'wmgUseCiteThisPage' => [
		'default' => false,
	],
	'wmgUseCitizen' => [
		'default' => false,
	],
	'wmgUseCitoid' => [
		'default' => false,
	],
	'wmgUseCleanChanges' => [
		'default' => false,
	],
	'wmgUseCodeEditor' => [
		'default' => false,
	],
	'wmgUseCodeMirror' => [
		'default' => false,
	],
	'wmgUseCollapsibleVector' => [
		'default' => false,
	],
	'wmgUseCollection' => [
		'default'  => false,
	],
	'wmgUseCommentStreams' => [
		'default' => false,
	],
	'wmgUseComments' => [
		'default' => false, // Sysop has 'commentadmin' by default
	],
	'wmgUseCommonsMetadata' => [
		'default' => false,
	],
	'wmgUseContactPage' => [
		'default' => false, // Add wiki config to ContactPage.php
		'christipediawiki' => true,
		'guiaslocaiswiki' => true,
		'test2wiki' => true,
	],
	'wmgUseContributionScores' => [
		'default' => false,
	],
	'wmgUseCosmos' => [
		'default' => false,
	],
	'wmgUseCreatePage' => [
		'default' => false,
	],
	'wmgUseCreatePageUw' => [
		'default' => false,
	],
	'wmgUseCreateRedirect' => [
		'default' => false,
	],
	'wmgUseCSS' => [
		'default' => false,
	],
	'wmgUseCalendarWikivoyage' => [
		'default' => false,
	],
	'wmgUseDarkMode' => [
		'default' => false,
	],
	'wmgUseDataDump' => [
		'default' => true,
	],
	'wmgUseDataTransfer' => [
		'default' => false,
	],
	'wmgUseDeleteUserPages' => [
		'default' => false,
	],
	'wmgUseDescription2' => [
		'default' => false,
	],
	'wmgUseDisambiguator' => [
		'default' => false,
	],
	'wmgUseDiscussionTools' => [
		'default' => false,
	],
	'wmgUseDismissableSiteNotice' => [
		'default' => true,
	],
	'wmgUseDisplayTitle' => [
		'default' => false,
	],
	'wmgUseDisqusTag' => [
		'default' => false,
		'test2wiki' => true,
	],
	'wmgUseDuskToDawn' => [
		'default' => false,
	],
	'wmgUseDonateBoxInSidebar' => [ # Disabled for now --Rececption123
		'default' => false,
		'metawiki' => true,
		'test2wiki' => true,
	],
	'wmgUseDPLForum' => [
		'default' => false,
	],
	'wmgUseDummyFandoomMainpageTags' => [
		'default' => false,
	],
	'wmgUseDynamicPageList' => [ // DynamicPageList and DynamicPageList3 should NOT be enabled together; they do not work together
		'default' => false,
	],
	'wmgUseDynamicPageList3' => [ // DynamicPageList and DynamicPageList3 should NOT be enabled together; they do not work together
		'default' => false,
	],
	'wmgUseDynamicSidebar' => [
		'default' => false,
	],
	'wmgUseEditcount' => [
		'default' => false,
	],
	'wmgUseEditSubpages' => [
		'default' => false,
	],
	'wmgUseErudite' => [
		'default' => false,
	],
	'wmgUseFancyBoxThumbs' => [
		'default' => false,
	],
	'wmgUseFeaturedFeeds' => [
		'default' => false, // Not enabled anywhere?
	],
	'wmgUseFemiwiki' => [
		'default' => false,
	],
	'wmgUseFlaggedRevs' => [
		'default' => false,
	],
	'wmgUseFlow' => [
		'default' => false, // Please make sure MediaWiki services is enabled on the wiki in the services.yaml file in the services repo
	],
	'wmgUseForcePreview' => [
		'default' => false,
	],
	'wmgUseForeground' => [
		'default' => false,
	],
	'wmgUseFontAwesome' => [
		'default' => false,
	],
	'wmgUseGadgets' => [
		'default' => false,
	],
	'wmgUseGamepress' => [
		'default' => false,
	],
	'wmgUseGenealogy' => [
		'default' => false,
	],
	'wmgUseGeoCrumbs' => [
		'default' => false,
	],
	'wmgUseGeoData' => [
		'default' => false,
	],
	'wmgUseGettingStarted' => [
		'default' => false,
	],
	'wmgUseGlobalUserPage' => [
		'default' => false,
	],
	'wmgUseGoogleDocs4MW' => [
		'default' => false,
	],
	'wmgUseGoogleNewsSitemap' => [
		'default' => false,
	],
	'wmgUseGraph' => [
		'default' => false,
	],
	'wmgUseGroupsSidebar' => [
		'default' => false,
	],
	'wmgUseGuidedTour' => [
		'default' => false,
	],
	'wmgUseHAWelcome' => [
		'default' => false,
	],
	'wmgUseHeaderFooter' => [
		'default' => false,
	],
	'wmgUseHeaderTabs' => [
		'default' => false,
	],
	'wmgUseHideSection' => [
		'default' => false,
	],
	'wmgUseHighlightLinksInCategory' => [
		'default' => false,
	],
	'wmgUseImageMap' => [
		'default' => false,
	],
	'wmgUseImageRating' => [
		'default' => false,
	],
	'wmgUseInputBox' => [
		'default' => false,
	],
	'wmgUseJavascriptSlideshow' => [
		'default' => false,
	],
	'wmgUseJosa' => [
		'default' => false,
	],
	'wmgUseJSBreadCrumbs' => [
		'default' => false,
	],
	'wmgUseJsCalendar' => [
		'default' => false,
	],
	'wmgUseJsonConfig' => [
		'default' => false,
	],
	'wmgUseKartographer' => [
		'default' => false,
	],
	'wmgUseLabeledSectionTransclusion' => [
		'default' => false,
	],
	'wmgUseLanguageSelector' => [
		'default' => false,
	],
	'wmgUseLastModified' => [
		'default' => false,
	],
	'wmgUseLdap' => [
		'default' => false,
		'ldapwikiwiki' => true,
	],
	'wmgUseLiberty' => [
		'default' => false,
	],
	'wmgUseLingo' => [
		'default' => false,
	],
	'wmgUseLinkSuggest' => [
		'default' => false,
	],
	'wmgUseLinkTarget' => [
		'default' => false,
	],
	'wmgUseLinkTitles' => [
		'default' => false,
	],
	'wmgUseLinter' => [
		'default' => false,
	],
	'wmgUseListings' => [
		'default' => false,
	],
	'wmgUseLoopsCombo' => [
		'default' => false,
	],
	'wmgUseMagicNoCache' => [
		'default' => false,
	],
	'wmgUseMaps' => [
		'default' => false,
	],
	'wmgUseMask' => [
		'default' => false,
	],
	'wmgUseMassEditRegex' => [
		'default' => false, // sysop is given permission 'masseditregex' by default
	],
	'wmgUseMassMessage' => [
		'default' => false,
	],
	'wmgUseMath' => [
		'default' => false,
	],
	'wmgUseMediaWikiChat' => [
		'default' => false,
	],
	'wmgUseMedik' => [
		'default' => false,
	],
	'wmgUseMermaid' => [
		'default' => false,
	],
	'wmgUseMetrolook' => [
		'default' => false,
	],
	'wmgUseMobileFrontend' => [
		'default' => false,
	],
	'wmgUseMobileTabsPlugin' => [
		'default' => false,
	],
	'wmgUseModeration' => [
		'default' => false,
	],
	'wmgUseModernSkylight' => [
		'default' => false,
	],
	'wmgUseMsCatSelect' => [
		'default' => false,
	],
	'wmgUseMsLinks' => [
		'default' => false,
	],
	'wmgUseMsUpload' => [
		'default' => false,
	],
	'wmgUseMultimediaViewer' => [
		'default' => false,
	],
	'wmgUseMultiBoilerplate' => [
		'default' => false,
	],
	'wmgUseMyVariables' => [
		'default' => false,
	],
	'wmgUseNewestPages' => [
		'default' => false,
	],
	'wmgUseNewSignupPage' => [
		'default' => false,
	],
	'wmgUseNewsletter' => [
		'default' => false,
	],
	'wmgUseNewUserMessage' => [
		'default' => false,
	],
	'wmgUseNewUserNotif' => [
		'default' => false,
	],
	'wmgUseNimbus' => [
		'default' => false,
	],
	'wmgUseNostalgia' => [
		'default' => false,
	],
	'wmgUseNoTitle' => [
		'default' => false,
	],
	'wmgUseNukeDPL' => [
		'default' => false,
	],
	'wmgUseNumberedHeadings' => [
		'default' => false,
	],
	'wmgUseOpenGraphMeta' => [
		'default' => false,
	],
	'wmgUseOrphanedTalkPages' => [
		'default' => false,
	],
	'wmgUsePageDisqus' => [
		'default' => false,
	],
	'wmgUsePagedTiffHandler' => [
		'default' => false,
	],
	'wmgUsePageForms' => [
		'default' => false,
	],
	'wmgUsePageNotice' => [
		'default' => false,
	],
	'wmgUsePageTriage' => [
		'default' => false,
	],
	'wmgUsePDFEmbed' => [
		'default' => false,
	],
	'wmgUsePdfHandler' => [
		'default' => false,
	],
	'wmgUsePipeEscape' => [
		'default' => false,
	],
	'wmgUsePivot' => [
		'default' => false,
	],
	'wmgUsePoem' => [
		'default' => false,
	],
	'wmgUsePopups' => [
		'default' => false,
	],
	'wmgUsePollNY' => [
		'default' => false,
	],
	'wmgUsePortableInfobox' => [
		'default' => false,
	],
	'wmgUsePreloader' => [
		'default' => false,
	],
	'wmgUseProofreadPage' => [
		'default' => false,
	],
	'wmgUseProtectSite' => [
		'default' => false,
	],
	'wmgUsePurge' => [
		'default' => false,
	],
	'wmgUseQuiz' => [
		'default' => false,
	],
	'wmgUseQuizGame' => [
		'default' => false,
	],
	'wmgUseRandomGameUnit' => [
		'default' => false,
	],
	'wmgUseRandomImage' => [
		'default' => false,
	],
	'wmgUseRandomSelection' => [
		'default' => false,
	],
	'wmgUseRefreshed' => [
		'default' => false,
	],
	'wmgUseRegexFunctions' => [
		'default' => false,
	],
	'wmgUseRelatedArticles' => [
		'default' => false,
	],
	'wmgUseReplaceText' => [
		'default' => false,
	],
	'wmgUseRevisionSlider' => [
		'default' => false,
	],
	'wmgUseRightFunctions' => [
		'default' => false,
	],
	'wmgUseRSS' => [
		'default' => false,
	],
	'wmgUseSandboxLink' => [
		'default' => false,
	],
	'wmgUseScore' => [
		'default' => false,
	],
	'wmgUseScratchBlocks' => [
		'default' => false,
	],
	'wmgUseShortURL' => [
		'default' => true,
		'macfan4000wiki' => false,
	],
	'wmgUseSimpleBlogPage' => [
		'default' => false,
	],
	'wmgUseSimpleChanges' => [
		'default' => false,
	],
	'wmgUseSimpleTooltip' => [
		'default' => false,
	],
	'wmgUseSlackNotifications' => [
		'default' => false,
	],
	'wmgUseSoftRedirector' => [
		'default' => false,
	],
	// Requires copying of two directories: https://www.mediawiki.org/wiki/Extension:SocialProfile#Directories
	// Should be this, but change $nameofwiki at the end:
	// sudo -u www-data cp -R /srv/mediawiki/w/extensions/SocialProfile/avatars /srv/mediawiki/w/extensions/SocialProfile/awards /mnt/mediawiki-static/$nameofwiki/
	'wmgUseSocialProfile' => [
		'default' => false,
	],
	'wmgUseSpoilers' => [
		'default' => false,
	],
	'wmgUseSpriteSheet' => [
		'default' => false,
	],
	'wmgUseStopForumSpam' => [
		'default' => false,
		'test2wiki' => true,
	],
	'wmgUseSubpageFun' => [
		'default' => false,
	],
	'wmgUseSubPageList3' => [
		'default' => false,
	],
	'wmgUseSyntaxHighlightGeSHi' => [
		'default' => false,
	],
	'wgScribuntoUseGeSHi' => [
		'default' => true,
	],
	// Combo of Tabs + Tabber
	'wmgUseTabsCombination' => [
		'default' => false,
	],
	'wmgUseTemplateData' => [
		'default' => false,
	],
	'wmgUseTemplateSandbox' => [
		'default' => false,
	],
	'wmgUseTemplateStyles' => [
		'default' => false,
	],
	'wmgUseTemplateWizard' => [
		'default' => false,
	],
	'wmgUseTextExtracts' => [
		'default' => false,
	],
	'wmgUseTheme' => [
		'default' => false,
	],
	'wmgUseTimedMediaHandler' => [
		'default' => false,
	],
	'wmgUseTimeline' => [
		'default' => false,
	],
	'wmgUseThanks' => [
		'default' => false,
	],
	'wmgUseTimeMachine' => [
		'default' => false,
	],
	'wmgUseTitleKey' => [
		'default' => false,
	],
	'wmgUseTocTree' => [
		'default' => false,
	],
	'wmgUseTranslate' => [
		'default' => false,
	],
	'wmgUseTranslationNotifications' => [
		'default' => false,
	],
	'wmgUseTreeAndMenu' => [
		'default' => false,
	],
	'wmgUseTruglass' => [
		'default' => false,
	],
	'wmgUseTweeki' => [
		'default' => false,
	],
	'wmgUseTwitterTag' => [
		'default' => false,
	],
	'wmgUseTwoColConflict' => [
		'default' => false,
	],
	'wmgUseUniversalLanguageSelector' => [
		'default' => false,
	],
	'wmgUseUploadsLink' => [
		'default' => false,
	],
	'wmgUseUrlGetParameters' => [
		'default' => false,
	],
	'wmgUseUserFunctions' => [
		'default' => false,
	],
	'wmgUseUserWelcome' => [
		'default' => false,
	],
	'wmgUseVEForAll' => [
		'default' => false,
	],
	'wmgUseVoteNY' => [
		'default' => false,
	],
	'wmgUseVideo' => [
		'default' => false,
	],
	'wmgUseVisualEditor' => [
		'default' => false, // Please make sure MediaWiki services is enabled on the wiki in the services.yaml file in the services repo
	],
	'wmgUseVariables' => [
		'default' => false,
	],
	'wmgUseWebChat' => [
		'default' => false,
	],
	'wmgUseWhoIsWatching' => [
		'default' => false,
		'test2wiki' => true,
	],
	'wmgUseWidgets' => [
		'default' => false,
	],
	'wmgUseWikibaseRepository' => [
		'default' => false,
	],
	'wmgUseWikibaseClient' => [
		'default' => false,
	],
	'wmgUseWikiCategoryTagCloud' => [
		'default' => false,
	],
	'wmgUseWikidataPageBanner' => [
		'default' => false,
	],
	'wmgUseWikiForum' => [
		'default' => false,
	],
	'wmgUsewikihiero' => [
		'default' => false,
	],
	'wmgUseWikimediaIncubator' => [
		'default' => false,
	],
	'wmgUseWikiLove' => [
		'default' => false,
	],
	'wmgUseWikiSeo' => [
		'default' => false,
	],
	'wmgUseWikiTextLoggedInOut' => [
		'default' => false,
	],
	'wmgUseYouTube' => [
		'default' => false,
	],

	// TemplateStyles config
	'wgTemplateStylesAllowedUrls' => [
		// Remove when https://gerrit.wikimedia.org/r/486828/ is merged
		'default' => [
			'audio' => [
				'<^(?:https:)?\/\/upload\\.wikimedia\\.org\/wikipedia\/commons\/>',
			],
			'image' => [
				'<^(?:https:)?\/\/upload\\.wikimedia\\.org\/wikipedia\/commons\/>',
			],
			'svg' => [
				'<^(?:https:)?\/\/upload\\.wikimedia\\.org/wikipedia\/commons\/[^?#]*\\.svg(?:[?#]|$)>',
			],
			'font' => [],
			'namespace' => [ '<.>' ],
			'css' => [],
		],
	],

	// External link target
	'wgExternalLinkTarget' => [
		'default' => false,
	],

	// Allow External Images
	'wgAllowExternalImages' => [
		'default' => false,
	],
	'wgAllowExternalImagesFrom' => [
		'default' => false,
		'astrobiologywiki' => [
			'https://www.science20.com',
			'https://quora.com',
			'https://robertinventor.com',
		],
		'doomsdaydebunkedwiki' => [
			'https://www.science20.com',
			'https://quora.com',
			'https://robertinventor.com',
		],
	],

	// Allow HTML <img> tag
	'wgAllowImageTag' => [
		'default' => false,
	],
	'egApprovedRevsEnabledNamespaces' => [
 		'default' => [
			NS_MAIN => true,
			NS_USER => true,
 			NS_FILE => true,
			NS_TEMPLATE => true,
			NS_HELP => true,
			NS_PROJECT => true
		],
 		'valkyrienskieswiki' => [
			NS_MAIN => false,
			NS_USER => false,
 			NS_FILE => false,
			NS_TEMPLATE => false,
			NS_HELP => false,
			NS_PROJECT => false
		],
	],

	// FlaggedRevs
	'wmgFlaggedRevsProtection' => [
		'default' => false,
	],
	'wmgFlaggedRevsTags' => [
		'default' => [
			'status' => [
				'quality' => 1,
				'levels' => 2,
				'pristine' => 3,
			],
		],
		'infectopedwiki' => [
			'accuracy' => [
				'levels' => 4,
				'quality' => 2,
				'pristine' => 4,
			],
			'depth' => [
				'levels' => 4,
				'quality' => 2,
				'pristine' => 4,
			],
			'tone' => [
				'levels' => 4,
				'quality' => 1,
				'pristine' => 4,
			],
		],
		'isvwiki' => [
			'status' => [
				'levels' => 1,
				'quality' => 2,
				'pristine' => 4,
			],
		],
	],
	'wmgFlaggedRevsTagsRestrictions' => [
		'default' => [
			'status' => [
				'review' => 1,
				'autoreview' => 1,
			],
		],
	],
	'wmgFlaggedRevsTagsAuto' => [
		'default' => [
			'status' => 1,
		],
	],
	'wmgFlaggedRevsAutopromote' => [
		'default' => [
			'days' => 14,
			'edits' => 100,
			'excludeLastDays' => 1,
			'benchmarks' => 1,
			'spacing' => 1,
			'totalContentEdits' => 100,
			'totalCheckedEdits' => 100,
			'uniqueContentPages' => 10,
			'editComments' => 80,
			'userpageBytes' => 1,
			'neverBlocked' => true,
			'maxRevertedEditRatio' => 0.05,
		],
		'isvwiki' => false,
		'pruebawiki' => false,
	],
	'wmgFlaggedRevsAutoReview' => [
		'default' => 3,
	],
	'wmgFlaggedRevsRestrictionLevels' => [
		'default' => [ '', 'sysop' ],
	],
	'wmgSimpleFlaggedRevsUI' => [
		'default' => false,
	],
	'wmgFlaggedRevsLowProfile' => [
		'default' => false,
	],

	// Footers
 	'+wgFooterIcons' => [
 		'default' => [
 			'poweredby' => [
 				'miraheze' => [
 					'src' => "https://$wmgUploadHostname/metawiki/7/7e/Powered_by_Miraheze.png",
 					'url' => 'https://meta.miraheze.org/wiki/',
 					'alt' => 'Miraheze Wiki Hosting'
 				]
 			]
 		]
 	],
	'wmgWikiapiaryFooterPageName' => [
		'default' => '',
	],

	'wgMaxCredits' => [
		'default' => 0,
	],
	'wgShowCreditsIfMax' => [
		'default' => true,
	],

	// https://www.mediawiki.org/wiki/Skin:Liberty
	'wgLibertyUseGravatar' => [
		'default' => false,
	],

	// Files
	'wgEnableUploads' => [
		'default' => true,
	],
	// T3797
	'wgMaxUploadSize' => [
		'default' => 262144000,
	],
	'wgUploadSizeWarning' => [
		'default' => 262144000,
	],
	'wgAllowCopyUploads' => [
		'default' => false,
	],
	'wgCopyUploadsFromSpecialUpload' => [
		'default' => false,
	],
	'wgGenerateThumbnailOnParse' => [
		'default' => false,
	],
	// Must be kept insync with wgFileExtensions in ManageWikiSettings.php
	'wgFileExtensions' => [
		'default' => [ 'gif', 'ico', 'jpeg', 'jpg', 'ogg', 'png', 'svg', 'pdf', 'djvu' ],
	],
	'wgUseInstantCommons' => [
		'default' => true,
	],
	'wgMaxImageArea' => [
		'default' => '1.25e7',
	],
	'wgMirahezeCommons' => [
		'default' => true,
	],
	'wgEnableImageWhitelist' => [
		'default' => false,
	],
	'wgShowArchiveThumbnails' => [
		'default' => true,
	],
	'wgVerifyMimeType' => [
		'default' => true,
	],
	'wgSVGMetadataCutoff' => [
		'default' => 262144,
	],
	'wgSVGConverter' => [
		'default' => 'ImageMagick',
	],

	// Foreground
	'wgForegroundFeatures' => [
		'default' => [],
		'marionetworkwiki' => [
			'enableTabs' => true,
			'navbarIcon' => true,
			'showFooterIcons' => true,
			'wikiName' => ''
		],
		'rotompediawiki' => [
			'navbarIcon' => true,
		]
	],

	// Gallery Options
	'+wgGalleryOptions' => [
		'default' => [],
		'dcmultiversewiki' => [
			'imagesPerRow' => 0,
			'imageWidth' => 120,
			'imageHeight' => 120,
			'captionLength' => true,
			'showBytes' => true,
			'showDimensions' => true,
			'mode' => 'packed',
		],
		'mcuwiki' => [
			'imagesPerRow' => 0,
			'imageWidth' => 120,
			'imageHeight' => 120,
			'captionLength' => true,
			'showBytes' => true,
			'showDimensions' => true,
			'mode' => 'packed',
		],
	],

	// GlobalBlocking
	'wgApplyGlobalBlocks' => [
		'default' => true,
		'metawiki' => false,
		'simcitywiki' => false, // let me do the blocking on my wiki, please
	],
	'wgGlobalBlockingDatabase' => [
		'default' => 'mhglobal', // use mhglobal for global blocks
	],

	// GlobalCssJs
	'wgGlobalCssJsConfig' => [
		'default' => [
			'wiki' => 'metawiki',
			'source' => 'metawiki',
		],
	],
	'+wgResourceLoaderSources' => [
		'default' => [
			'metawiki' => [
				'apiScript' => '//meta.miraheze.org/w/api.php',
				'loadScript' => '//meta.miraheze.org/w/load.php',
			],
		],
	],
	'wgUseGlobalSiteCssJs' => [
		'default' => false,
	],

	// GlobalPreferences
	'wgGlobalPreferencesDB' => [
		'default' => 'mhglobal',
		'ldapwikiwiki' => 'ldapwikiwiki',
	],
	
	// GlobalUsage
	'wgGlobalUsageDatabase' => [
		'default' => 'commonswiki',
	],

	// GlobalUserPage
	'wgGlobalUserPageAPIUrl' => [
		'default' => 'https://login.miraheze.org/w/api.php',
	],
	'wgGlobalUserPageDBname' => [
		'default' => 'loginwiki',
	],

	// Grant Permissions for BotPasswords and OAuth
	'+wgGrantPermissions' => [
		'default' => [
			'basic' => [
				'user' => true,
			],
		],
	],
	
	// HAWelcome
	'wgHAWelcomeWelcomeUsername' => [
		'default' => $wgSitename,
	],
	'wgHAWelcomeStaffGroupName' => [
		'default' => 'sysop',
	],
	'wgHAWelcomeSignatureFromPreferences' => [
		'default' => false,
	],
	
	// HideSection
	'wgHideSectionImages' => [
		'default' => false,
	],
	// HighlightLinks
	'wgHighlightLinksInCategory' => [
		'default' => [],
		'allthetropeswiki' => [
			'Trope' => 'trope',
			'YMMV_Trope' => 'ymmv',
		],
	],

	// ImageMagick
	'wgUseImageMagick' => [
		'default' => true,
	],
	'wgImageMagickCommand' => [
		'default' => '/usr/bin/convert',
	],

	// IncidentReporting
	'wgIncidentReportingDatabase' => [
		'default' => 'incidents',
	],
	'wgIncidentReportingServices' => [
		'default' => [
			'Bacula' => 'https://meta.miraheze.org/wiki/Tech:Bacula',
			'DNS' => 'https://meta.miraheze.org/wiki/Tech:DNS',
			'Ganglia' => 'https://meta.miraheze.org/wiki/Tech:Ganglia',
			'Icinga' => 'https://meta.miraheze.org/wiki/Tech:Icinga',
			'LizardFS' => false,
			'Mail' => 'https://meta.miraheze.org/wiki/Tech:Mail',
			'MariaDB' => 'https://meta.miraheze.org/wiki/Tech:MariaDB',
			'Matomo' => 'https://meta.miraheze.org/wiki/Tech:Matomo',
			'MediaWiki' => 'https://meta.miraheze.org/wiki/Tech:MediaWiki_appserver',
			'NFS' => 'https://meta.miraheze.org/wiki/Tech:NFS',
			'NGINX' => 'https://meta.miraheze.org/wiki/Tech:Nginx',
			'Parsoid' => 'https://meta.miraheze.org/wiki/Tech:Parsoid',
			'Phabricator' => 'https://meta.miraheze.org/wiki/Tech:Phabricator',
			'Puppet Server' => 'https://meta.miraheze.org/wiki/Tech:Puppet',
			'Redis' => 'https://meta.miraheze.org/wiki/Tech:Redis',
			'Salt' => 'https://meta.miraheze.org/wiki/Tech:Salt',
			'Service Providers' => false,
			'Varnish' => 'https://meta.miraheze.org/wiki/Tech:Varnish',
		],
	],
	'wgIncidentReportingTaskUrl' => [
		'default' => 'https://phabricator.miraheze.org/',
	],

	// Interwiki
	'wgEnableScaryTranscluding' => [
		'default' => true,
	],
	'wgInterwikiCentralDB' => [
		'default' => 'metawiki',
	],
	'wgExtraInterlanguageLinkPrefixes' => [
		'default' => [],
		'+nonciclopediawiki' => [
			'dlm',
			'olb',
			'tlh',
			'zombie',
		],
		'+commonswiki' => [
			'wikimediacommons',
			'w',
			'eswiki',
			'wikispecies',
		],
		'+hispanowiki' => [
			'u',
			'w',
		],
		'+privadowiki' => [
			'w',
			'v',
			'n',
		],
		'+ucroniaswiki' => [
			'h',
			'w',
			'alt',
		],
	],

	// Imports
	'wgImportSources' => [
		'default' => [
			'meta',
			'templatewiki',
		],
		'+incubatorwiki' => [
			'wmincubator',
			'wikiaincubatorplus',
		],
		'+metawiki' => [
			'wikipedia',
		], 
		'+sesupportwiki' => [
			'mrjaroslavikwiki',
		], 
		'+simcitywiki' => [
			'wikipedia',
		],
		'wikitrashwiki' => [
			'wikipedia' => [
				'it',
			],
		],
		'+zhdelwiki' => [
			'wikipedia',
			'zhwikipedia',
		],
	],

	// Job Queue
	'wgJobRunRate' => [
		'default' => 0,
	],

	// JsonConfig
	'wgJsonConfigEnableLuaSupport' => [
		'default' => true,
	],
	'wgJsonConfigs' => [
		'default' => [
			'Map.JsonConfig' => [
				'namespace' => 486,
				'nsName' => 'Data',
				// page name must end in ".map", and contain at least one symbol
				'pattern' => '/.\.map$/',
				'remote' => [ 'url' => 'https://commons.miraheze.org/w/api.php' ],
				'store' => false,
				'license' => 'CC-BY-SA 4.0',
				'isLocal' => false,
			],
			'Tabular.JsonConfig' => [
				'namespace' => 486,
				'nsName' => 'Data',
				// page name must end in ".tab", and contain at least one symbol
				'pattern' => '/.\.tab$/',
				'remote' => [ 'url' => 'https://commons.miraheze.org/w/api.php' ],
				'store' => false,
				'license' => 'CC-BY-SA 4.0',
				'isLocal' => false,
			],
		],
		'+commonswiki' => [
			'Map.JsonConfig' => [
				'namespace' => 486,
				'nsName' => 'Data',
				// page name must end in ".map", and contain at least one symbol
				'pattern' => '/.\.map$/',
				'remote' => [ 'url' => false ], 
				'store' => true,
				'license' => 'CC-BY-SA 4.0',
				'isLocal' => false,
			],
			'Tabular.JsonConfig' => [
				'namespace' => 486,
				'nsName' => 'Data',
				// page name must end in ".tab", and contain at least one symbol
				'pattern' => '/.\.tab$/',
				'remote' => [ 'url' => false ],
				'store' => true,
				'license' => 'CC-BY-SA 4.0',
				'isLocal' => false,
			],
		],
	],
	'wgJsonConfigInterwikiPrefix' => [
		'default' => 'commons',
		'commonswiki' => 'meta',
	],
	'wgJsonConfigModels' => [
		'default' => [
			'Map.JsonConfig' => 'JsonConfig\JCMapDataContent',
			'Tabular.JsonConfig' => 'JsonConfig\JCTabularContent',
		],
	],

	// Kartographer
	'wgKartographerWikivoyageMode' => [
		'default' => false,
	 ],
	'wgKartographerUseMarkerStyle' => [
		'default' => false,
	 ],

	// Language
	'wgLanguageCode' => [ // Hardcode "en"
		'default' => 'en',
	],

	// License
	'wgRightsIcon' => [
		'default' => 'https://meta.miraheze.org/w/resources/assets/licenses/cc-by-sa.png',
		'freesoftwarepediawiki' => 'https://upload.wikimedia.org/wikipedia/commons/4/42/GFDL_Logo.svg',
		'jadtechwiki' => "https://$wmgUploadHostname/jadtechwiki/d/d8/CopyrightIcon.png",
		'revitwiki' => "https://$wmgUploadHostname/revitwiki/d/d8/All_Rights_Reserved.png",
	],
	'wgRightsPage' => [
		'default' => '',
		'diavwiki' => 'Project:Copyrights',
		'wisdomwikiwiki' => 'Copyleft',
	],
	'wgRightsText' => [
		'default' => 'Creative Commons Attribution Share Alike',
		'airforcewiki' => 'Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)',
		'armywiki' => 'Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)',
		'freesoftwarepediawiki' => 'GNU Free Documentation License',
		'exlinkwikiwiki' => 'Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)',
		'incubatorwiki' => 'Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)',
		'isvwiki' => 'Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)',
		'jadtechwiki' => 'Copyright © Jak and Daxter Technical Wiki. All rights reserved.',
		'militarywiki' => 'Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)',
		'privadowiki' => 'Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)',
		'revitwiki' => '©2013-2020 by Lionel J. Camara (All Rights Reserved)',
		'reviwikiwiki' => 'Creative Commons Attribution Share Alike',
		'wikidemocracywiki' => 'Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)',
		'wikigrowthwiki' => 'Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)',
		'wikilexiconwiki' => 'Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)',
		'worldtrainwikiwiki' => 'Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)',
	],
	'wgRightsUrl' => [
		'default' => 'https://creativecommons.org/licenses/by-sa/4.0/',
		'airforcewiki' => 'https://creativecommons.org/licenses/by-sa/3.0',
		'armywiki' => 'https://creativecommons.org/licenses/by-sa/3.0',
		'freesoftwarepediawiki' => 'http://www.gnu.org/licenses/fdl-1.3.html',
		'exlinkwikiwiki' => 'https://creativecommons.org/licenses/by-sa/3.0',
		'incubatorwiki' => 'https://creativecommons.org/licenses/by-sa/3.0',
		'isvwiki' => 'https://creativecommons.org/licenses/by-sa/3.0',
		'jadtechwiki' => 'https://jadtech.miraheze.org/wiki/MediaWiki:Copyright',
		'militarywiki' => 'https://creativecommons.org/licenses/by-sa/3.0',
		'privadowiki' => 'https://creativecommons.org/licenses/by-sa/3.0',
		'revitwiki' => 'https://revit.miraheze.org/wiki/MediaWiki:Copyright',
		'reviwikiwiki' => 'https://creativecommons.org/licenses/by-sa/2.0/kr',
		'wikidemocracywiki' => 'https://creativecommons.org/licenses/by-sa/3.0',
		'wikigrowthwiki' => 'https://creativecommons.org/licenses/by-sa/3.0',
		'wikilexiconwiki' => 'https://creativecommons.org/licenses/by-sa/3.0',
		'worldtrainwikiwiki' => 'https://creativecommons.org/licenses/by-sa/3.0',
	],
	'wmgWikiLicense' => [
		'default' => 'cc-by-sa',
	],

	// Links?
	'+wgUrlProtocols' => [
		'default' => [],
		// file protocol only allowed on private wikis
		'gzewiki' => [ "file://" ],
		'kaiwiki' => [ "file://" ],
		'vtwiki' => [ "discord://" ],
	],

	// LiliPond
	'wgScoreLilyPond' => [
		'default' => '/dev/null',
	],

	// Mail
	'wgEnableEmail' => [
		'default' => true,
	],
	// When changing the default,
	// also updated ManageWiki.php ("Moderation Email") with the new default.
	'wgPasswordSender' => [
		'default' => 'noreply@miraheze.org',
	],
	'wgSMTP' => [
		'default' => [
			'host' => 'mail.miraheze.org',
			'port' => 25,
			'IDHost' => 'miraheze.org',
			'auth' => true,
			'username' => 'noreply',
			'password' => $wmgSMTPPassword,
		],
	],
	'wgEnotifWatchlist' => [
		'default' => true,
	],
	'wgUserEmailUseReplyTo' => [
		'default' => true,
	],
	'wgEmailConfirmToEdit' => [
		'default' => false,
	],
	'wgEmergencyContact' => [
		'default' => 'noreply@miraheze.org',
	],

	// ManageWiki
	'wgManageWiki' => [
		'default' => [
			'core' => true,
			'extensions' => true,
			'namespaces' => true,
			'permissions' => true,
			'settings' => true
		],
	],
	'wgManageWikiExtensionsDefault' => [
		'default' => [
			'categorytree',
			'cite',
			'citethispage',
			'darkmode',
			'globaluserpage',
			'mobilefrontend',
			'syntaxhighlight_geshi',
		],
	],
	'wgManageWikiCDBDirectory' => [
		'default' => '/srv/mediawiki/w/cache/managewiki',
	],
	'wgManageWikiNamespacesExtraContentModels' => [
		'default' => [],
	],
	'wgManageWikiPermissionsAdditionalAddGroups' => [
		'default' => [],
		'rf1botwiki' => [
			'bureaucrat' => [
				'Repo_Maintainer',
			],
		],
		'simcitywiki' => [
			'founder' => [
				'banned',
			],
		],
		'sesupportwiki' => [
			'sysop' => [
				'editor',
			],
		],
	],
	'wgManageWikiPermissionsAdditionalRights' => [
		'default' => [
			'*' => [
				'autocreateaccount' => true,
				'read' => true,
			],
			'checkuser' => [
				'checkuser' => true,
				'checkuser-log' => true,
			],
			'interwiki-admin' => [
				'interwiki' => true
			],
			'oversight' => [
				'abusefilter-hidden-log' => true,
				'abusefilter-hide-log' => true,
				'browsearchive' => true,
				'deletedhistory' => true,
				'deletedtext' => true,
				'deletelogentry' => true,
				'deleterevision' => true,
				'hideuser' => true,
				'suppressionlog' => true,
				'suppressrevision' => true,
			],
			'user' => [
				'mwoauthmanagemygrants' => true,
				'user' => true,
			],
			'steward' => [
				'centralauth-usermerge' => true,
				'usermerge' => true,
				'userrights' => true,
			],
		],
		'+autocountwiki' => [
			'authors' => [
				'torunblocked' => true,
				'read' => true,
			],
		],
		'+bitcoindebateswiki' => [
			'emailconfirmed' => [
				'read' => true,
			],
		],
		'+cmgwiki' => [
			'gst' => [
				'read' => true,
			],
		],
		'+hypopediawiki' => [
			'bureaucrat' => [
				'bureaucrat' => true,
			],
		],
		'+igrovyesistemywiki' => [
			'autopatrolled' => [
				'trusted' => true,
			],
			'autoreview' => [
				'trusted' => true,
			],
			'bot' => [
				'trusted' => true,
			],
			'editor' => [
				'trusted' => true,
			],
			'reviewer' => [
				'trusted' => true,
			],
			'co' => [
				'co' => true,
				'ceo' => true,
				'trusted' => true,
			],
			'bureaucrat' => [
				'bureaucrat' => true,
				'trusted' => true,
			],
			'sysmag' => [
				'sysmag' => true,
				'trusted' => true,
			],
			'sysop' => [
				'trusted' => true,
			],
			'ceo' => [
				'bureaucrat' => true,
				'sysmag' => true,
				'trusted' => true,
			],
			'UserType1' => [
				'UserType1' => true,
			],
			'UserType2' => [
				'UserType2' => true,
			],
			'UserType3' => [
				'UserType3' => true,
			],
			'UserType4' => [
				'UserType4' => true,
			],
			'UserType5' => [
				'UserType5' => true,
			],
			'UserType6' => [
				'UserType6' => true,
			],
			'UserType7' => [
				'UserType7' => true,
			],
		],
		'+jacksonheightswiki' => [
			'emailconfirmed' => [
				'read' => true,
			],
		],
		'+ldapwikiwiki' => [
			'sysop' => [
				'managewiki-restricted' => true,
			],
		],
		'+metawiki' => [
			'confirmed' => [
				'mwoauthproposeconsumer' => true,
				'mwoauthupdateownconsumer' => true,
			],
			'globalsysop' => [
				'abusefilter-modify-global' => true,
				'centralauth-lock' => true,
				'globalblock' => true,
			],
			'proxybot' => [
				'globalblock' => true,
				'centralauth-lock' => true,
			],
			'steward' => [
				'abusefilter-modify-global' => true,
				'centralauth-lock' => true,
				'centralauth-oversight' => true,
				'centralauth-rename' => true,
				'centralauth-unmerge' => true,
				'createwiki' => true,
				'globalblock' => true,
				'managewiki' => true,
				'managewiki-restricted' => true,
				'noratelimit' => true,
				'userrights' => true,
				'userrights-interwiki' => true,
			],
			'sysop' => [
				'interwiki' => true,
			],
			'user' => [
				'requestwiki' => true,
			],
			'wikicreator' => [
				'createwiki' => true,
			],
		],
		'+nenawikiwiki' => [
			'editor' => [
				'edit-content-pages' => true,
				'edit-talkpage' => true,
			],
			'emailconfirmed' => [
				'read' => true,
			],
			'nenamembers' => [
				'edit-talkpage' => true,
			],
			'sysop' => [
				'edit-admin-pages' => true,
			],
		],
		'+pruebawiki' => [
			'bureaucrat' => [
				'bureaucrat' => true,
			],
			'consul' => [
				'read' => true,
				'bureaucrat' => true,
				'consul' => true,
				'torunblocked' => true,
			],
			'testgroup' => [
				'read' => true,
			],
		],
		'+quircwiki' => [
			'QuIRC_Staff' => [
				'editstaffprotected' => true,
			],
		],
		'+rf1botwiki' => [
			'Repo_Maintainer' => [
				'editrepos' => true,
			],
		],
		'+sesupportwiki' => [
			'editor' => [
				'editor' => true,
			],
			'sysop' => [
				'editor' => true,
			],
		],
		'simcitywiki' => [
			'steward' => [
				'hideuser' => true,
				'abusefilter-hide-log' => true,
				'abusefilter-hidden-log' => true,
				'abusefilter-privatedetails' => true,
				'abusefilter-privatedetails-log' => true,
				'suppressionlog' => true,
				'suppressrevision' => true,
				'viewsuppressed' => true,
				'interwiki' => true,
				'centralauth-rename' => true,
				'renameuser' => true,
				'checkuser' => true,
				'checkuser-log' => true,
				'managewiki-restricted' => true,
				'bigdelete' => true,
				'userrights' => true,
				'usermerge' => true,
				'centralauth-usermerge' => true,
				'oathauth-enable' => true,
			],
			'user' => [
				'mwoauthmanagemygrants' => true,
			],
		],
		'+testwiki' => [
			'consul' => [
				'consul' => true,
				'bureaucrat' => true,
			],
			'bureaucrat' => [
				'bureaucrat' => true,
			],
		],
		'+thesciencearchiveswiki' => [
			'sysop' => [
				'templateeditor' => true,
			],
			'templateeditor' => [
				'templateeditor' => true,
			],
		],
		'+vnenderbotwiki' => [
			'templateeditor' => [
					  'template' => true,
			],
			'extendedconfirmed' => [
					     'extendedconfirmed' => true,
			],
			'Owner' => [
				'template' => true,
				'extendedconfirmed' => true,
				'owner' => true,
			],
		],
		'+whentheycrywiki' => [
			'user' => [
				'edit-create' => true,
			],
		],
		'+wikitestwiki' => [
			'consul' => [
				'consul' => true,
				'bureaucrat' => true,
			],
			'bureaucrat' => [
				'bureaucrat' => true,
			],
		],
	],
	'wgManageWikiPermissionsAdditionalRemoveGroups' => [
		'default' => [],
		'rf1botwiki' => [
			'bureaucrat' => [
				'Repo_Maintainer',
			],
		],
		'sesupportwiki' => [
			'sysop' => [
				'editor',
			],
		],
		'simcitywiki' => [
			'founder' => [
				'banned',
			],
		],
	],
	'wgManageWikiPermissionsBlacklistRights' => [
		'default' => [
			'any' => [
				'abusefilter-hide-log',
				'abusefilter-hidden-log',
				'abusefilter-modify-global',
				'abusefilter-private',
				'abusefilter-private-log',
				'abusefilter-privatedetails',
				'abusefilter-privatedetails-log',
				'aft-oversighter',
				'autocreateaccount',
				'bigdelete',
				'centralauth-lock',
				'centralauth-oversight',
				'centralauth-rename',
				'centralauth-unmerge',
				'centralauth-usermerge',
				'checkuser',
				'checkuser-log',
				'createwiki',
				'editincidents',
				'editothersprofiles-private',
				'flow-suppress',
				'globalblock',
				'globalblock-exempt',
				'globalgroupmembership',
				'globalgrouppermissions',
				'hideuser',
				'interwiki',
				'investigate',
				'managewiki-restricted',
				'managewiki-editdefault',
				'moderation-checkuser',
				'mwoauthmanageconsumer',
				'mwoauthmanagemygrants',
				'mwoauthsuppress',
				'mwoauthviewprivate',
				'mwoauthviewsuppressed',
				'oathauth-api-all',
				'oathauth-disable-for-user',
				'oathauth-verify-user',
				'oathauth-view-log',
				'renameuser',
				'requestwiki',
				'siteadmin',
				'stopforumspam',
				'suppressionlog',
				'suppressrevision',
				'titleblacklistlog',
				'usermerge',
				'userrights',
				'userrights-interwiki',
				'viewglobalprivatefiles',
				'viewpmlog',
				'viewsuppressed',
			],
			'*' => [
				'read',
				'skipcaptcha',
				'torunblocked',
				'centralauth-merge',
				'generate-dump',
			],
		],
	],
	'wgManageWikiPermissionsBlacklistGroups' => [
		'default' => [
			'checkuser',
			'oversight',
			'steward',
			'staff',
			'interwiki-admin',
		],
	],
	'wgManageWikiPermissionsDefaultPrivateGroup' => [
		'default' => 'member',
	],
	'wgManageWikiHelpUrl' => [
		'default' => '//meta.miraheze.org/wiki/ManageWiki',
	],
	'wgManageWikiForceSidebarLinks' => [
		'default' => false,
	],
	'wgManageWikiNamespacesAdditional' => [
		'default' => [
			// Core config
			'wgExtraSignatureNamespaces' => [
				'name' => 'Enable "Signature" button on the edit toolbar under both main and talk pages.',
				'main' => true,
				'talk' => false,
				'blacklisted' => [],
				'vestyle' => false,
				'overridedefault' => [],
			],
		],
	],

	// MassMessage
	'wgAllowGlobalMessaging' => [
		'default' => false,
		'metawiki' => true,
	],

	// MatomoAnalytics
	'wgMatomoAnalyticsDatabase' => [
		'default' => 'mhglobal',
	],
	'wgMatomoAnalyticsServerURL' => [
		'default' => 'https://matomo.miraheze.org/',
	],
	'wgMatomoAnalyticsUseDB' => [
		'default' => true,
	],
	'wgMatomoAnalyticsGlobalID' => [
		'default' => 1,
	],
	'wgMatomoAnalyticsDisableCookie' => [
		'default' => true,
	],

	// MediaWikiChat settings
	'wgChatLinkUsernames' => [
		'default' => false,
	],
	'wgChatMeCommand' => [
		'default' => false,
	],

	//Medik settings
	'wgMedikShowLogo' => [
                'default' => false,
		'lakehubwiki' => 'main',
		'marionetworkwiki' => 'main',
	],
	'wgMedikContentWidth' => [
                'default' => false,
		'lakehubwiki' => 'full',
		'marionetworkwiki' => 'full',
	],
	'wgMedikColor' => [
                'default' => false,
		'lakehubwiki' => '#000',
		'marionetworkwiki' => '#ca0019',
	],
	'wgMedikLogoWidth' => [
		'default' => null,
		'lakehubwiki' => '199px',
		'marionetworkwiki' => '210px',
	],
	'wgMedikUseLogoWithoutText' => [
		'default' => false,
		'lakehubwiki' => true,
		'marionetworkwiki' => true,
	],
	// Metrolook settings
	'wgMetrolookDownArrow' => [
		'default' => true,
	],
	'wgMetrolookUploadButton' => [
		'default' => true,
	],
	'wgMetrolookBartile' => [
		'default' => true,
	],
	'wgMetrolookMobile' => [
		'default' => true,
	],
	'wgMetrolookUseIconWatch' => [
		'default' => true,
	],
	'wgMetrolookLine' => [
		'default' => true,
	],
	'wgMetrolookFeatures' => [
		'default' => [
			'collapsiblenav' => [
				'global' => false,
				'user' => true
			]
		],
		'thegreatwarwiki' => [
			'collapsiblenav' => [
				'global' => true,
				'user' => true
			]
		],
	],

	// Minerva settings
	'wgMinervaEnableSiteNotice' => [
		'default' => true,
	],
	'wgMinervaAlwaysShowLanguageButton' => [
		'default' => true,
		'solarawiki' => false,
	],

	// miraheze specific config
	'wgServicesRepo' => [
		'default' => '/srv/services/services',
	],

	'wgMirahezeServicesExtensions' => [
		'default' => [ 'VisualEditor', 'Flow' ],
	],

	// Misc. stuff
	'wgSitename' => [
		'default' => 'No sitename set!',
	],
	'wgAllowDisplayTitle' => [
		'default' => true,
	],
	'wgRestrictDisplayTitle' => [
		'default' => true, // Wikis with NoTitle have it set to false
	],
	'wgAllowExternalImagesFrom' => [
		'default' => '',
		'nonbinarywiki' => 'https://static.miraheze.org/',
	],
	'wgCapitalLinks' => [
		'default' => true,
	],
	'wgActiveUserDays' => [
		'default' => 30,
	],
	'wgEnableCanonicalServerLink' => [
		'default' => false,
	],
	'wgPageCreationLog' => [
		'default' => true,
	],
	'wgRCWatchCategoryMembership' => [
		'default' => false,
	],
	// Disable in ManageWiki to require all edits, even those by admins, to be approved
	'egApprovedRevsAutomaticApprovals' => [
		'default' => true,
	],
	'wgTrustedMediaFormats' => [
		'default' => [
			MEDIATYPE_BITMAP,
			MEDIATYPE_AUDIO,
			MEDIATYPE_VIDEO,
			"image/svg+xml",
			"application/pdf",
		],
		'+polytopewiki' => [
			MEDIATYPE_TEXT,
		],
	],

	// MobileFrontend
	'wmgMFAutodetectMobileView' => [
		'default' => false,
	],
	'wgMFDefaultSkinClass' => [
		'default' => 'SkinMinerva',
	],
	'wgMobileUrlTemplate' => [
		'default' => '',
	],

	// Moderation extension settings
	// Enable or disable notifications.
	'wgModerationNotificationEnable' => [
		'default' => false,
	],
	// Notify administrator only about new pages requests.
	'wgModerationNotificationNewOnly' => [
		'default' => false,
	],
	// Email to send notifications to.
	'wgModerationEmail' => [
		'default' => $wgPasswordSender,
	],
	'wgModerationIgnoredInNamespaces' => [
		'default' => [],
		'talenteddeviantswiki' => [
			NS_USER,
		],
	],
	'wgModerationOnlyInNamespaces' => [
		'default' => [],
		'talenteddeviantswiki' => [
			NS_MAIN, 
			NS_FILE
		],
	],

	// MsCatSelect vars
	'wgMSCS_WarnNoCategories' => [
		'default' => true,
	],

	// MsUpload settings
	'wgMSU_useDragDrop' => [
		'default' => true,
	],

	'wgMSU_showAutoCat' => [
		'default' => false,
	],

	'wgMSU_checkAutoCat' => [
		'default' => false,
	],

	'wgMSU_confirmReplace' => [
		'default' => false,
	],

	// MultiBoilerplate settings
	'wgMultiBoilerplateDiplaySpecialPage' => [
		'default' => false,
	],

	// MultimediaViewer (not beta)
	'wgMediaViewerEnableByDefault' => [
		'default' => false,
	],
	// MobileFrontend
	'wgMFNoMobilePages' => [
		'default' => [],
	],
	// Math
	'wgMathoidCli' => [
 		'default' => [
 			'/srv/mathoid/cli.js',
 			'-c',
 			'/etc/mathoid/config.yaml'
 		]
 	],
	'wgMathValidModes' => [
		'default' => [ 'mathml' ],
	],

	// New User Email Notification

	'wgNewUserNotifEmailTargets' => [
		'default' => [],
		'femmanwiki' => [ 'gustav@nyvell.net' ],
	],

	// OATHAuth
	'wgOATHAuthDatabase' => [
		'default' => 'mhglobal',
		'ldapwikiwiki' => 'ldapwikiwiki',
	],

	// OAuth
	'wgMWOAuthCentralWiki' => [
		'default' => 'metawiki',
		'ldapwikiwiki' => false,
	],
	'wgMWOAuthSharedUserSource' => [
		'default' => 'CentralAuth',
	],
	'wgMWOAuthSecureTokenTransfer' => [
		'default' => true,
	],

	// Pagelang
	'wgPageLanguageUseDB' => [
		'default' => false,
	],

	// Used for the PageDisqus extension
	'wgPageDisqusShortname' => [
		'default' => null,
	],

	// Used for the DisqusTag extension
	'wgDisqusShortname' => [
		'default' => null,
	],

	// Page Size
	'wgMaxArticleSize' => [
		'default' => 2048,
	],

	// Permissions
	'wgGroupsAddToSelf' => [
		'default' => [],
	],
	'wgGroupsRemoveFromSelf' => [
		'default' => [],
	],
	'wgRevokePermissions' => [
		'default' => [],
		'simcitywiki' => [
			'banned' => [
				'read' => true,
				'createaccount' => true,
				'viewmywatchlist' => true,
				'viewmyprivateinfo' => true,
				'editmywatchlist' => true,
				'editmyoptions' => true,
				'editmyprivateinfo' => true,
			],
		],
	],
	'wgImplicitGroups' => [
		'default' => [ '*', 'user', 'autoconfirmed' ],
		'bitcoindebateswiki' => [ '*', 'user', 'autoconfirmed', 'emailconfirmed' ],
	],

	// Password policy
	'wgPasswordPolicy' => [
		'default' => [
			'policies' => [
				'default' => [
					'MinimalPasswordLength' => [ 'value' => 6, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchUsername' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchBlacklist' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotBeSubstringInUsername' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchDefaults' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'MaximalPasswordLength' => [ 'value' => 4096, 'suggestChangeOnLogin' => true ],
					'PasswordNotInCommonList' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
				],
				'bot' => [
					'MinimalPasswordLength' => [ 'value' => 8, 'suggestChangeOnLogin' => true ],
					'MinimumPasswordLengthToLogin' => [ 'value' => 6, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchUsername' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchBlacklist' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotBeSubstringInUsername' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchDefaults' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'MaximalPasswordLength' => [ 'value' => 4096, 'suggestChangeOnLogin' => true ],
					'PasswordNotInCommonList' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
				],
				'sysop' => [
					'MinimalPasswordLength' => [ 'value' => 8, 'suggestChangeOnLogin' => true ],
					'MinimumPasswordLengthToLogin' => [ 'value' => 6, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchUsername' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchBlacklist' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotBeSubstringInUsername' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchDefaults' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'MaximalPasswordLength' => [ 'value' => 4096, 'suggestChangeOnLogin' => true ],
					'PasswordNotInCommonList' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
				],
				'bureaucrat' => [
					'MinimalPasswordLength' => [ 'value' => 8, 'suggestChangeOnLogin' => true ],
					'MinimumPasswordLengthToLogin' => [ 'value' => 6, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchUsername' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchBlacklist' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotBeSubstringInUsername' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'PasswordCannotMatchDefaults' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
					'MaximalPasswordLength' => [ 'value' => 4096, 'suggestChangeOnLogin' => true ],
					'PasswordNotInCommonList' => [ 'value' => true, 'suggestChangeOnLogin' => true ],
				],
			],
			'checks' => [
				'MinimalPasswordLength' => 'PasswordPolicyChecks::checkMinimalPasswordLength',
				'MinimumPasswordLengthToLogin' => 'PasswordPolicyChecks::checkMinimumPasswordLengthToLogin',
				'PasswordCannotMatchUsername' => 'PasswordPolicyChecks::checkPasswordCannotMatchUsername',
				'PasswordCannotBeSubstringInUsername' =>
					'PasswordPolicyChecks::checkPasswordCannotBeSubstringInUsername',
				'PasswordCannotMatchBlacklist' => 'PasswordPolicyChecks::checkPasswordCannotMatchDefaults',
				'PasswordCannotMatchDefaults' => 'PasswordPolicyChecks::checkPasswordCannotMatchDefaults',
				'MaximalPasswordLength' => 'PasswordPolicyChecks::checkMaximalPasswordLength',
				'PasswordNotInLargeBlacklist' => 'PasswordPolicyChecks::checkPasswordNotInCommonList',
				'PasswordNotInCommonList' => 'PasswordPolicyChecks::checkPasswordNotInCommonList',
			],
		],
	],

	// Preferences
 	'+wgDefaultUserOptions' => [
 		'default' => [
 			'enotifwatchlistpages' => 0,
 			'math' => 'mathml',
 			'usebetatoolbar' => 1,
 			'usebetatoolbar-cgd' => 1
 		],
		'+dcmultiversewiki' => [
			'usecodemirror' => 1,
			'visualeditor-newwikitext' => 1,
			'visualeditor-enable' => 1,
			'usebetatoolbar' => 0,
			'usebetatoolbar-cgd' => 0,
			'visualeditor-enable-experimental' => 1,
		],
		'+isvwiki' => [
			'flow-topiclist-sortby' => 'newest',
		],
		'+minecraftathomewiki' => [
			'enotifwatchlistpages' => 0,
		],
		'+reviwikiwiki' => [
			'usenewrc' => 0
		],
		'+solarawiki' => [
			'usecodemirror' => 1,
		],
		'+yablestudiowiki' => [
			'visualeditor-newwikitext' => 1,
			'visualeditor-enable' => 1,
			'visualeditor-tabs' => 'multi-tab',
		],
	],
	'+wgHiddenPrefs' => [
		'default' => [],
		'dcmultiversewiki' => [
			'managewikisidebar',
			'math',
			'multimediaviewer-enable',
			'visualeditor-betatempdisable',
			'flow-visualeditor',
			'visualeditor-newwikitext',
			'visualeditor-enable',

		],
		'marionetworkwiki' => [
			'skin',
		],
	],

	// Redis
	'wmgRedisSettings' => [
		'default' => [
			'cache' => [
				'server'   => '/run/nutcracker/nutcracker.sock',
				'password' => $wmgRedisPassword,
			],
			'jobrunner' => [
				'server'   => '51.89.160.135:6379',
				'password' => $wmgRedisPassword,
			],
		],
	],

	// RateLimits
	'+wgRateLimits' => [
		'default' => [],
		'metawiki' => [
			'requestwiki' => [
				'user' => [ 1, 3600 ],
			],
		],
	],

	// RecentChanges
	'wgRCMaxAge' => [
		'default' => 180 * 24 * 3600,
	],
	'wgRCLinkDays' => [
		'default' => [ 1, 3, 7, 14, 30 ],
	],

	// RelatedArticles settings
	'wgRelatedArticlesFooterWhitelistedSkins' => [
		'default' => [
			'minerva',
			'timeless',
			'vector',
		],
	],
	'wgRelatedArticlesUseCirrusSearch' => [
		'default' => false,
	],

	// Restriction types
	'wgRestrictionLevels' => [
		'default' => [
			'',
			'user',
			'autoconfirmed',
			'sysop'
		],
		'+wikitestwiki' => [
			'bureaucrat',
			'consul',
		],
		'+bigforestwiki' => [
			'editvoter',
		],
		'+cmgwiki' => [
			'bureaucrat',
			'sysop',
			'pm',
			'member',
		],
		'+hypopediawiki' => [
			'bureaucrat',
		],
		'igrovyesistemywiki' => [
			'trusted',
			'sysmag',
			'bureaucrat',
			'ceo',
			'co',
		],
		'+quircwiki' => [
			'editstaffprotected',
		],
		'+rf1botwiki' => [
			'editrepos',
		],
		'+pruebawiki' => [
			'bureaucrat',
			'consul',
		],
		'+sesupportwiki' => [
			'editor',
		],
		'simcitywiki' => [
			'autoconfirmed',
			'sysop',
		],
		'+testwiki' => [
			'bureaucrat',
			'consul',
		],
		'+thesciencearchiveswiki' => [
			'templateeditor',
		],
		'+vnenderbotwiki' => [
			'template',
			'extendedconfirmed',
			'owner'
		],
	],
	'wgRestrictionTypes' => [
		'default' => [
			'create',
			'edit',
			'move',
			'upload',
			'delete',
			'protect'
		],
	],

	// RottenLinks
	'wgRottenLinksCurlTimeout' => [
		'default' => 10,
	],

	// Robot policy
	'wgDefaultRobotPolicy' => [
		'default' => 'index,follow',
	],
	// Robot policy
	'wgNamespaceRobotPolicies' => [
		'default' => [
			'NS_SPECIAL' => 'noindex',
		],
		'+taswinwiki' => [
			'NS_TEMPLATE' => 'noindex,nofollow',
		],
		'+horizonwiki' => [
			'NS_MAIN' => 'index,follow'
		],
		'+hispanowiki' => [
			'NS_TEMPLATE' => 'noindex,nofollow',
			'NS_MODULE' => 'noindex,nofollow',
			'NS_MEDIAWIKI' => 'noindex,nofollow',
			'NS_USER' => 'noindex,nofollow',
		],
		'+ucroniaswiki' => [
			'NS_TEMPLATE' => 'noindex,nofollow',
			'NS_MODULE' => 'noindex,nofollow',
			'NS_MEDIAWIKI' => 'noindex,nofollow',
			'NS_USER' => 'noindex,nofollow',
			'NS_ANEXO' => 'index,follow',
		],
	],

	// Referrer Policy
	'wgReferrerPolicy' => [
		'default' => [ 'origin-when-cross-origin', 'origin' ],
	],

	// RSS Settings
	'wgRSSCacheAge' => [
		'default' => '3600'
	],
	'wgRSSProxy' => [
		'default' => false,
	],
	'wgRSSDateDefaultFormat' => [
		'default' => 'Y-m-d H:i:s'
	],

	// Scribunto
	'wgCodeEditorEnableCore' => [
		'default' => true,
	],
	'wgScribuntoUseCodeEditor' => [
		'default' => true,
	],
	//
	'wgScribuntoSlowFunctionThreshold' => [
		'default' => 0.99,
	],
	'wgScribuntoEngineConf' => [
		'default' => [
			'luasandbox' => [
				'class' => "Scribunto_LuaSandboxEngine",
 				'memoryLimit' => 52428800,
 				'cpuLimit' => 10,
				'profilerPeriod' => 0.02,
 				'allowEnvFuncs' => false,
 				'maxLangCacheSize' => 200
			],
			'luastandalone' => [
				'class' => "Scribunto_LuaStandaloneEngine",
 				'errorFile' => null,
 				'luaPath' => null,
 				'memoryLimit' => 52428800,
				'cpuLimit' => 10,
				'profilerPeriod' => 0.02,
 				'allowEnvFuncs' => false,
 				'maxLangCacheSize' => 200
			],
			'luaautodetect' => [
 				'factory' => 'Scribunto_LuaEngine::newAutodetectEngine',
 			],
		],
	],

	// SimpleChanges
	'wgSimpleChangesOnlyContentNamespaces' => [
		'default' => false,
	],
	'wgSimpleChangesOnlyLatest' => [
		'default' => true,
	],
	'wgSimpleChangesShowUser' => [
		'default' => false,
	],

	// WikiSEO configs
	'wgTwitterCardType' => [
		'default' => 'summary_large_image',
	],
	'wgGoogleSiteVerificationKey' => [
		'default' => null,
	],
	'wgBingSiteVerificationKey' => [
		'default' => null,
	],
	'wgFacebookAppId' => [
		'default' => null,
	],
	'wgYandexSiteVerificationKey' => [
		'default' => null,
	],
	'wgAlexaSiteVerificationKey' => [
		'default' => null,
	],
	'wgPinterestSiteVerificationKey' => [
		'default' => null,
	],

	'wgExpensiveParserFunctionLimit' => [
		'default' => 99, //per https://www.mediawiki.org/wiki/Manual:$wgExpensiveParserFunctionLimit
	],

	// Site notice opt out
	'wmgSiteNoticeOptOut' => [
		'default' => false,
	],

	// Server
	'wgArticlePath' => [
		'default' => '/wiki/$1',
	],
	'wgDisableOutputCompression' => [
		'default' => true,
	],
	'wgScriptExtension' => [
		'default' => '.php',
	],
	'wgScriptPath' => [
		'default' => '/w',
	],
	'wgServer' => [
 		'default' => 'https://miraheze.org',
 	],
	'wgShowHostnames' => [
		'default' => true,
	],
	'wgUsePathInfo' => [
		'default' => true,
	],

	// Shell
 	'wgMaxShellMemory' => [
 		'default' => 2097152
 	],

	// SiteNotice
	'wgDismissableSiteNoticeForAnons' => [
		'default' => true,
	],

	// Skins
	'+wgSkipSkins' => [
		'default' => [],
		'marionetworkwiki' => [
			'cologneblue',
			'modern',
			'monobook',
			'vector',
			'timeless',
			'minerva',
			'minervaneue'
		],
	],

	// SocialProfile
	'wgUserBoard' => [
		'default' => false,
	],
	'wgUserProfileThresholds' => [
		'default' => [
			'edits' => 0,
		],
		'allthetropes' => [
			'edits' => 10,
		],
	],
	'wgUserProfileDisplay' => [
		'default' => [
			'activity' => false,
 			'articles' => true, // Blog
 			'avatar' => true,
 			'awards' => true,
			'board' => false,
			'custom' => true,
			'foes' => false,
			'friends' => false,
 			'games' => false,
 			'gifts' => true,
 			'interests' => true,
 			'personal' => true,
 			'profile' => true,
 			'stats' => false,
 			'userboxes' => false,
		],
	],
	'wgUserStatsPointValues' => [
		'default' => [
			'edit' => 50,
			'vote' => 0,
			'comment' => 0,
			'comment_plus' => 0,
			'comment_ignored' => 0,
			'opinions_created' => 0,
			'opinions_pub' => 0,
			'referral_complete' => 0,
			'friend' => 0,
			'foe' => 0,
			'gift_rec' => 0,
			'gift_sent' => 0,
			'points_winner_weekly' => 0,
			'points_winner_monthly' => 0,
			'user_image' => 1000,
			'poll_vote' => 0,
			'quiz_points' => 0,
			'quiz_created' => 0,
		],
	],
	'wgFriendingEnabled' => [
		'default' => true,
		'allthetropeswiki' => false,
	],

	// Statistics
	'wgArticleCountMethod' => [
		'default' => 'link', // To update it, you will need to run the maintenance/updateArticleCount.php script
		'fourleafficswiki' => 'any',
		'gfiwiki' => 'any',
		'hispanowiki' => 'any',
		'hispano76wiki' => 'any',
		'hrfwiki2wiki' => 'any',
		'ildrilwiki' => 'any',
		'nonciclopediawiki' => 'any',
		'privadowiki' => 'any',
		'simswiki' => 'any',
		'ucroniaswiki' => 'any',
	],

	// Vanish (MW 1.34+)
	'wgUseCdn' => [
		'default' => true,
	],
	'wgCdnServers' => [
		'default' => [
			'128.199.139.216:81', // cp3
			'51.77.107.210:81', // cp6
			'51.89.160.142:81', // cp7
			'51.222.27.129:81', // cp9
		],
	],

	// Style
	'wgAllowUserCss' => [
		'default' => true,
	],
	'wgAllowUserJs' => [
		'default' => true,
	],
	'wgAppleTouchIcon' => [
		'default' => '/apple-touch-icon.png',
	],
	'wgCentralAuthLoginIcon' => [
		'default' => '/usr/share/nginx/favicons/default.ico',
	],
	'wgDefaultSkin' => [
		'default' => 'vector',
	],
	'wgFavicon' => [
		'default' => '/favicon.ico',
	],
	'wgLogo' => [
		'default' => "https://$wmgUploadHostname/metawiki/3/35/Miraheze_Logo.svg",
	],
	'wgWordmark' => [
		'default' => false,
	],
	'wgWordmarkHeight' => [
		'default' => 18,
	],
	'wgWordmarkWidth' => [
		'default' => 116,
	],

	// Timeless
	'wgTimelessWordmark' => [
		'default' => null,
		'closinglogosgroupwiki' => 'CLGHorizontal.png',
	],

	// Timezone
	'wgLocaltimezone' => [
		'default' => 'UTC',
	],

	// Theme
	'wgDefaultTheme' => [
		'default' => "",
	],

	// TitleBlacklist
	'wgTitleBlacklistSources' => [
		'default' => [
			'global' => [
				'type' => 'url',
				'src'  => 'https://meta.miraheze.org/w/index.php?title=Title_blacklist&action=raw',
			],
		],
	],
	'wgTitleBlacklistUsernameSources' => [
		'default' => '*',
	],
	'wgTitleBlacklistLogHits' => [
		'default' => false,
	],
	'wgTitleBlacklistBlockAutoAccountCreation' => [
		'default' => false,
	],
	'wgTidyConfig' => [
		'default' => [
			'driver' => 'RemexHtml'
		],
	],

	// Translate
	'wmgTranslateBlacklist' => [
		'default' => [],
		'metawiki' => [
			'*' => [
				'en' => 'English is the source language.',
			],
		],
		'minecraftathomewiki' => [
			'*' => [
				'en-gb' => 'This variant of English is not allowed to be translated.',
			],
		],
		'spiralwiki' => [
			'*' => [
				'en' => 'English is the source language.',
			],
		],
	],
	'wmgTranslateTranslationServices' => [
		'default' => [],
	],
	'wmgTranslateDocumentationLanguageCode' => [
		'default' => false,
		'metawiki' => 'qqq',
	],
	'wmgUseYandexTranslate' => [
		'default' => false,
	],
	// Uploads
 	'wmgPrivateUploads' => [
 		'default' => false,
 		'ciptamediawiki' => true,
 		'rhinosf1wiki' => true,
 		'staffwiki' => true,
 		'stateofwiki' => true,
 		'mikekilitterboxwiki' => true
 	],

	// UniversalLanguageSelector
	'wgULSAnonCanChangeLanguage' => [
		'default' => false,
	],
	'wgULSLanguageDetection' => [
		'default' => false,
	],

	// UrlShortener
	'wgUrlShortenerTemplate' => [
		'default' => '/m/$1',
	],
	'wgUrlShortenerDBName' => [
		'default' => 'metawiki',
	],
	// use wgUrlShortenerAllowedDomains
	'wgUrlShortenerDomainsWhitelist' => [
		'default' => []
	],
	'wgUrlShortenerAllowedDomains' => [
		'default' => [
			'(.*\.)?miraheze\.org',
			'adadevelopersacademy\.wiki',
			'allthetropes\.org',
			'antiguabarbudacalypso\.com',
			'astrapedia\.ru',
			'athenapedia\.org',
			'b1tes\.org',
			'bconnected\.aidanmarkham\.com',
			'bebaskanpengetahuan\.org',
			'wiki\.ameciclo\.org',
			'wiki\.autocountsoft\.com',
			'wiki\.besuccess\.com',
			'wiki\.clonedeploy\.org',
			'wiki\.ciptamedia\.org',
			'wiki\.consentcraft\.uk',
			'cornetto\.online',
			'dariawiki\.org',
			'decrypted\.wiki',
			'wiki.dobots\.nl',
			'wiki\.dottorconte\.eu',
			'wiki\.downhillderelicts\.com',
			'wiki\.drones4nature\.info',
			'wiki\.dwplive\.com',
			'www\.eerstelijnszones\.be',
			'embobada\.com',
			'wiki\.exnihilolinux\.org',
			'froggy\.info',
			'fibromyalgia-engineer\.com',
			'fikcyjnatv\.pl',
			'wiki\.gamergeeked\.us',
			'wiki\.gesamtschule-nordkirchen\.de',
			'garrettcountyguide\.com',
			'give\.effectively\.to',
			'wiki\.grottocenter\.org',
			'wiki\.gtsc\.vn',
			'www\.iceposeidonwiki\.com',
			'wiki\.inebriation-confederation\.com',
			'wiki\.jacksonheights\.nyc',
			'karagash\.info',
			'wiki\.kourouklides\.com',
			'kunwok\.org',
			'www\.lab612\.at',
			'wiki\.ldmsys\.net',
			'wiki\.lostminecraftminers\.org',
			'lodge\.jsnydr\.com',
			'wiki\.make717\.org',
			'wiki\.macc\.nyc',
			'madgenderscience\.wiki',
			'marinebiodiversitymatrix\.org',
			'meregos\.com',
			'nenawiki\.org',
			'wiki\.ngscott\.net',
			'nonbinary\.wiki',
			'wiki\.lbcomms\.co.za',
			'wiki\.rizalespe\.com',
			'saf\.songcontests\.eu',
			'wiki\.staraves-no\.cz',
			'wiki.pupilliam\.com',
			'oecumene\.org',
			'www\.openonderwijs\.org',
			'papelor\.io',
			'permanentfuturelab\.wiki',
			'pl\.nonbinary\.wiki',
			'podpedia\.org',
			'programming\.red',
			'publictestwiki\.com',
			'pwiki.arkcls.com',
			'reviwiki\.info',
			'russopedia\.info',
			'private\.revi.wiki',
			'saveta\.org',
			'sdiy\.info',
			'studentwiki\.ddns\.net',
			'www\.splat-teams\.com',
			'takethatwiki\.com',
			'wiki\.taotac.org',
			'taotac\.info' .
			'wiki\.teessidehackspace\.org\.uk',
			'wiki\.tensorflow\.community',
			'thelonsdalebattalion\.co.uk',
			'toonpedia\.cf',
			'wiki\.tulpa\.info',
			'wiki\.valentinaproject.org',
			'wiki\.kaisaga.com',
			'wikiescola\.com\.br',
			'wiki\.worlduniversityandschool\.org' .
			'wikipuk\.cl',
			'wiki\.ombre\.io',
			'wiki.rmbrk\.com',
			'wisdomwiki\.org',
			'sandbox\.wisdomwiki.org',
			'savage-wiki\.com',
			'speleo\.wiki',
			'www\.zenbuddhism\.info',
			'wiki\.zymonic\.com',
			'espiral\.org',
			'spiral\.wiki',
			'wikibase\.revi\.wiki',
			'wiki\.teamwizardry\.com',
			'wiki\.svenskabriardklubben\.se',
			'www\.schulwiki\.de',
			'holonet\.pw',
			'guiasdobrasil\.com\.br',
			'enc\.for\.uz',
			'docs\.websmart\.media',
			'wiki\.mikrodev\.com',
			'wiki\.campaign-labour\.org',
			'encyclopedie\.didactiqueprofessionnelle\.org',
			'www\.thesimswiki\.com',
			'nonciclopedia\.org',
			'spcodex\.wiki',
			'vedopedia\.witches-empire\.com',
		],
	],

	// UserFunctions
	'wgUFEnablePersonalDataFunctions' => [
		'default' => false, // DO NOT set to true under any circumstances --Reception123
	],

	// VisualEditor
	'wmgVisualEditorEnableDefault' => [
		'default' => true,
	],
	'wgVisualEditorEnableWikitext' => [
		'default' => false,
	],
	'wgVisualEditorShowBetaWelcome' => [
		'default' => true,
	],
	'wgVisualEditorUseSingleEditTab' => [
		'default' => false,
	],
	'wgVisualEditorAvailableContentModels' => [
		'default' => [
			'wikitext' => 'article',
		],
		'dcmultiversewiki' => [
			'wikitext' => 'article',
			'javascript' => 'article',
			'css' => 'article',
			'scribunto' => 'article',
		],
	],
	'wgVisualEditorEnableDiffPage' => [
		'default' => false,
	],
	'wgVisualEditorEnableVisualSectionEditing' => [
		'default' => 'mobile',
	],

	// Protect site config
	'wgProtectSiteLimit' => [
		'default' => '1 week',
	],
	'wgProtectSiteDefaultTimeout' => [
		'default' => '1 hour',
	],

	// Wikibase
	'wmgAllowEntityImport' => [
		'default' => false,
	],
	'wmgEnableEntitySearchUI' => [
		'default' => true,
	],
	'wmgFederatedPropertiesEnabled' => [
		'default' => false,
	],
	'wmgWikibaseRepoUrl' => [
		'default' => 'https://wikidata.org'
	],
	'wmgWikibaseItemNamespaceID' => [
		'default' => 0
	],
	'wmgWikibasePropertyNamespaceID' => [
		'default' => 120
	],

	// WebChat config
	'wmgWebChatServer' => [
		'default' => false,
	],
	'wmgWebChatChannel' => [
		'default' => false,
	],
	'wmgWebChatClient' => [
		'default' => 'freenodeChat',
	],

	// WikiForum settings
	'wgWikiForumAllowAnonymous' => [
		'default' => true,
	],
	'wgWikiForumLogsInRC' => [
		'default' => true,
	],

	// Wikimedia Incubator Settings
	'wmincProjects' => [
		'default' => [
			'p' => 'Wikipedia',
			'b' => 'Wikibooks',
			't' => 'Wiktionary',
			'q' => 'Wikiquote',
			'n' => 'Wikinews',
			'y' => 'Wikivoyage',
			's' => 'Wikisource',
			'v' => 'Wikiversity',
		],
	],
	'wmincProjectSite' => [
		'default' => [
			'name' => 'Incubator Plus 2.0',
			'short' => 'incplus',
		],
	],
	'wmincSisterProjects' => [
		'default' => [
			'm' => 'Miraheze Meta',
		],
	],
	'wmincExistingWikis' => [
		'default' => null,
	],
	'wmincClosedWikis' => [
		'default' => false,
	],
	'wmincMultilingualProjects' => [
		'default' => [],
	],

	// WikiDiscover
	'wgWikiDiscoverClosedList' => [
		'default' => '/srv/mediawiki/dblist/closed.dblist',
	],
	'wgWikiDiscoverInactiveList' => [
		'default' => '/srv/mediawiki/dblist/inactive.dblist',
	],
	'wgWikiDiscoverPrivateList' => [
		'default' => '/srv/mediawiki/dblist/private.dblist',
	],

	// CreateWiki Defined Special Variables
	'cwClosed' => [
		'default' => false,
	],
	'cwInactive' => [
		'default' => false,
	],
	'cwPrivate' => [
		'default' => false,
	],

	// Uncategorised
	'wgRandomGameDisplay' => [
		'default' => [
			'random_picturegame' => false,
			'random_poll' => false,
			'random_quiz' => false,
		],
	],

	'wgForceHTTPS' => [
		'default' => true,
	],
];

$wi->setVariables(
	'/srv/mediawiki/w/cache',
	[
		'wiki'
	],
	[
		'miraheze.org' => 'wiki'
	]
);

// Start settings requiring access to variables
if ( !preg_match( '/^(.*)\.miraheze\.org$/', $wi->hostname, $matches ) ) {
	$wi->config->settings['wgCentralAuthCookieDomain'][$wi->dbname] = $wi->hostname;
	$wi->config->settings['wgCookieDomain'][$wi->dbname] = $wi->hostname;
}

if ( !file_exists( '/srv/mediawiki/w/cache/l10n/l10n_cache-en.cdb' ) ) {
	$wi->config->settings['wgLocalisationCacheConf']['default']['manualRecache'] = false;
}

if ( !preg_match( '/^mw[0-9]*/', wfHostname() ) ) {
	$wi->config->settings['wgUseCdn']['default'] = false;
}

$wi->config->settings['wmgWikibaseRepoDatabase']['default'] = $wi->dbname;
// sets wgThumbPath, we fetch wgScriptPath from wgConf.
$scriptPath = $wi->config->settings['wgScriptPath']['default'];
$wi->config->settings['wgThumbPath']['default'] = "$scriptPath/thumb_handler.php";
// End settings requiring access to variables

$wi->readCache();
$wi->config->extractAllGlobals( $wi->dbname );

// ManageWiki settings
require_once __DIR__ . "/ManageWikiExtensions.php";
require_once __DIR__ . "/ManageWikiSettings.php";

$wgUploadPath = "https://static.miraheze.org/$wgDBname";
$wgUploadDirectory = "/mnt/mediawiki-static/$wgDBname";

// Fonts
putenv( "GDFONTPATH=/usr/share/fonts/truetype/freefont" );

// Hook so that Terms of Service is included in footer
$wgHooks['SkinAddFooterLinks'][] = 'onLfTOSLink';
function onLfTOSLink(
	Skin $skin,
	string $key,
	array &$footerItems
) {
	if ( $key === 'places' ) {
		$footerItems['termsofservice'] = $skin->footerLink( 'termsofservice', 'termsofservicepage' );
	}
}

// Include other configuration files
require_once( '/srv/mediawiki/config/Database.php' );
require_once( '/srv/mediawiki/config/GlobalLogging.php' );
require_once( '/srv/mediawiki/config/LocalExtensions.php' );
require_once( '/srv/mediawiki/config/Redis.php' );
require_once( '/srv/mediawiki/config/Sitenotice.php' );

if ( $wi->missing ) {
	require_once( '/srv/mediawiki/config/MissingWiki.php' );
}

// per T3457 - Miraheze Commons
if ( $wgDBname !== 'commonswiki' && $wgMirahezeCommons ) {
	$wgForeignFileRepos[] = [
		'class' => 'ForeignDBViaLBRepo',
		'name' => 'shared-commons',
		'directory' => '/mnt/mediawiki-static/commonswiki',
		'url' => 'https://static.miraheze.org/commonswiki',
		'hashLevels' => $wgHashedSharedUploadDirectory ? 2 : 0,
		'thumbScriptUrl' => false,
		'transformVia404' => !$wgGenerateThumbnailOnParse,
		'hasSharedCache' => false,
		'fetchDescription' => true,
		'descriptionCacheExpiry' => 86400 * 7,
		'wiki' => 'commonswiki',
		'descBaseUrl' => 'https://commons.miraheze.org/wiki/File:',
	];
}

// When using ?forceprofile=1, a profile can be found as an HTML comment
// Disabled on production hosts because it seems to be causing performance issues (how ironic)
if (
	isset( $_GET['forceprofile'] )
	&& $_GET['forceprofile'] == 1
	&& wfHostname() === 'test2'
) {
        $wgProfiler['class'] = 'ProfilerXhprof';
        $wgProfiler['output'] = [ 'ProfilerOutputText' ];
        $wgProfiler['visible'] = false;

	// Prevent cache (better be safe than sorry)
        $wi->config->settings['wgUseCdn']['default'] = false;
}

// Define last to avoid all dependencies
require_once( '/srv/mediawiki/config/LocalWiki.php' );

// Define last - Extension message files for loading extensions
if ( !defined( 'MW_NO_EXTENSION_MESSAGES' ) ) {
	require_once( '/srv/mediawiki/config/ExtensionMessageFiles.php' );
}

if ( PHP_SAPI !== 'cli' ) {
	$host = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : '';
	switch ( $host ) {
		case 'jobrunner1.miraheze.org':
			$limit = 1200;
			break;
		case 'jobrunner2.miraheze.org':
			$limit = 1200;
			break;
		default:
			if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
				$limit = 110;
			} else {
				$limit = 60;
			}
	}

	set_time_limit( $limit );
}

// Last Stuff
$wi->config->extractAllGlobals( $wi->dbname );
$wgConf = $wi->config;
