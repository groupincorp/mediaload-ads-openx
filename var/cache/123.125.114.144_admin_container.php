<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class ReviveAdserverCachedContainer extends Container
{
    private $parameters;
    private $targetDirs = [];

    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services = [];
        $this->methodMap = [
            'filesystem' => 'getFilesystemService',
            'filesystem.adapter.ftp' => 'getFilesystem_Adapter_FtpService',
            'filesystem.adapter.local' => 'getFilesystem_Adapter_LocalService',
            'html5.parser.adobe_edge' => 'getHtml5_Parser_AdobeEdgeService',
            'html5.parser.meta' => 'getHtml5_Parser_MetaService',
            'html5.zip.manager' => 'getHtml5_Zip_ManagerService',
        ];
        $this->privates = [
            'filesystem' => true,
            'filesystem.adapter.ftp' => true,
            'filesystem.adapter.local' => true,
            'html5.parser.adobe_edge' => true,
            'html5.parser.meta' => true,
            'html5.zip.manager' => true,
        ];

        $this->aliases = [];
    }

    public function getRemovedIds()
    {
        return [
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'filesystem' => true,
            'filesystem.adapter.ftp' => true,
            'filesystem.adapter.local' => true,
            'html5.parser.adobe_edge' => true,
            'html5.parser.meta' => true,
            'html5.zip.manager' => true,
        ];
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since Symfony 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);

        return true;
    }

    /**
     * Gets the private 'filesystem' shared service.
     *
     * @return \League\Flysystem\Filesystem
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \League\Flysystem\Filesystem(${($_ = isset($this->services['filesystem.adapter.local']) ? $this->services['filesystem.adapter.local'] : ($this->services['filesystem.adapter.local'] = new \League\Flysystem\Adapter\Local('/var/www/html/www/images', 0))) && false ?: '_'});
    }

    /**
     * Gets the private 'filesystem.adapter.ftp' shared service.
     *
     * @return \League\Flysystem\Adapter\Ftp
     */
    protected function getFilesystem_Adapter_FtpService()
    {
        return $this->services['filesystem.adapter.ftp'] = new \League\Flysystem\Adapter\Ftp(['host' => '', 'username' => '', 'password' => '', 'root' => '', 'passive' => '']);
    }

    /**
     * Gets the private 'filesystem.adapter.local' shared service.
     *
     * @return \League\Flysystem\Adapter\Local
     */
    protected function getFilesystem_Adapter_LocalService()
    {
        return $this->services['filesystem.adapter.local'] = new \League\Flysystem\Adapter\Local('/var/www/html/www/images', 0);
    }

    /**
     * Gets the private 'html5.parser.adobe_edge' shared service.
     *
     * @return \RV\Parser\Html5\AdobeEdgeParser
     */
    protected function getHtml5_Parser_AdobeEdgeService()
    {
        return $this->services['html5.parser.adobe_edge'] = new \RV\Parser\Html5\AdobeEdgeParser();
    }

    /**
     * Gets the private 'html5.parser.meta' shared service.
     *
     * @return \RV\Parser\Html5\MetaParser
     */
    protected function getHtml5_Parser_MetaService()
    {
        return $this->services['html5.parser.meta'] = new \RV\Parser\Html5\MetaParser();
    }

    /**
     * Gets the private 'html5.zip.manager' shared service.
     *
     * @return \RV\Manager\Html5ZipManager
     */
    protected function getHtml5_Zip_ManagerService()
    {
        $this->services['html5.zip.manager'] = $instance = new \RV\Manager\Html5ZipManager(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : $this->getFilesystemService()) && false ?: '_'});

        $instance->addParser(${($_ = isset($this->services['html5.parser.meta']) ? $this->services['html5.parser.meta'] : ($this->services['html5.parser.meta'] = new \RV\Parser\Html5\MetaParser())) && false ?: '_'}, 0);
        $instance->addParser(${($_ = isset($this->services['html5.parser.adobe_edge']) ? $this->services['html5.parser.adobe_edge'] : ($this->services['html5.parser.adobe_edge'] = new \RV\Parser\Html5\AdobeEdgeParser())) && false ?: '_'}, 5);

        return $instance;
    }

    public function getParameter($name)
    {
        $name = (string) $name;
        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            $name = $this->normalizeParameterName($name);

            if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
                throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
            }
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;
        $name = $this->normalizeParameterName($name);

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [];
    private $dynamicParameters = [];

    /**
     * Computes a dynamic parameter.
     *
     * @param string $name The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
    }

    private $normalizedParameterNames = [
        'openads.requiressl' => 'openads.requireSSL',
        'openads.sslport' => 'openads.sslPort',
        'ui.applicationname' => 'ui.applicationName',
        'ui.headerfilepath' => 'ui.headerFilePath',
        'ui.footerfilepath' => 'ui.footerFilePath',
        'ui.logofilepath' => 'ui.logoFilePath',
        'ui.headerforegroundcolor' => 'ui.headerForegroundColor',
        'ui.headerbackgroundcolor' => 'ui.headerBackgroundColor',
        'ui.headeractivetabcolor' => 'ui.headerActiveTabColor',
        'ui.headertextcolor' => 'ui.headerTextColor',
        'ui.gzipcompression' => 'ui.gzipCompression',
        'ui.supportlink' => 'ui.supportLink',
        'ui.combineassets' => 'ui.combineAssets',
        'ui.dashboardenabled' => 'ui.dashboardEnabled',
        'ui.hidenavigator' => 'ui.hideNavigator',
        'ui.zonelinkingstatistics' => 'ui.zoneLinkingStatistics',
        'ui.disabledirectselection' => 'ui.disableDirectSelection',
        'databasecharset.checkcomplete' => 'databaseCharset.checkComplete',
        'databasecharset.clientcharset' => 'databaseCharset.clientCharset',
        'databasemysql.statisticssortbuffersize' => 'databaseMysql.statisticsSortBufferSize',
        'databasepgsql.schema' => 'databasePgsql.schema',
        'webpath.deliveryssl' => 'webpath.deliverySSL',
        'webpath.imagesssl' => 'webpath.imagesSSL',
        'store.webdir' => 'store.webDir',
        'store.ftphost' => 'store.ftpHost',
        'store.ftppath' => 'store.ftpPath',
        'store.ftpusername' => 'store.ftpUsername',
        'store.ftppassword' => 'store.ftpPassword',
        'store.ftppassive' => 'store.ftpPassive',
        'allowedbanners.sql' => 'allowedBanners.sql',
        'allowedbanners.web' => 'allowedBanners.web',
        'allowedbanners.url' => 'allowedBanners.url',
        'allowedbanners.html' => 'allowedBanners.html',
        'allowedbanners.text' => 'allowedBanners.text',
        'allowedbanners.video' => 'allowedBanners.video',
        'delivery.cacheexpire' => 'delivery.cacheExpire',
        'delivery.cachestoreplugin' => 'delivery.cacheStorePlugin',
        'delivery.cachepath' => 'delivery.cachePath',
        'delivery.aclsdirectselection' => 'delivery.aclsDirectSelection',
        'delivery.execphp' => 'delivery.execPhp',
        'delivery.ctdelimiter' => 'delivery.ctDelimiter',
        'delivery.chdelimiter' => 'delivery.chDelimiter',
        'delivery.cgiforcestatusheader' => 'delivery.cgiForceStatusHeader',
        'delivery.ecpmselectionrate' => 'delivery.ecpmSelectionRate',
        'delivery.enablecontrolonpurecpm' => 'delivery.enableControlOnPureCPM',
        'delivery.assetclientcacheexpire' => 'delivery.assetClientCacheExpire',
        'defaultbanner.imageurl' => 'defaultBanner.imageUrl',
        'p3p.compactpolicy' => 'p3p.compactPolicy',
        'p3p.policylocation' => 'p3p.policyLocation',
        'privacy.disableviewerid' => 'privacy.disableViewerId',
        'privacy.anonymiseip' => 'privacy.anonymiseIp',
        'graphs.ttfdirectory' => 'graphs.ttfDirectory',
        'graphs.ttfname' => 'graphs.ttfName',
        'logging.adrequests' => 'logging.adRequests',
        'logging.adimpressions' => 'logging.adImpressions',
        'logging.adclicks' => 'logging.adClicks',
        'logging.trackerimpressions' => 'logging.trackerImpressions',
        'logging.reverselookup' => 'logging.reverseLookup',
        'logging.proxylookup' => 'logging.proxyLookup',
        'logging.defaultimpressionconnectionwindow' => 'logging.defaultImpressionConnectionWindow',
        'logging.defaultclickconnectionwindow' => 'logging.defaultClickConnectionWindow',
        'logging.ignorehosts' => 'logging.ignoreHosts',
        'logging.ignoreuseragents' => 'logging.ignoreUserAgents',
        'logging.enforceuseragents' => 'logging.enforceUserAgents',
        'logging.blockadclickswindow' => 'logging.blockAdClicksWindow',
        'logging.blockinactivebanners' => 'logging.blockInactiveBanners',
        'maintenance.automaintenance' => 'maintenance.autoMaintenance',
        'maintenance.timelimitscripts' => 'maintenance.timeLimitScripts',
        'maintenance.operationinterval' => 'maintenance.operationInterval',
        'maintenance.blockadimpressions' => 'maintenance.blockAdImpressions',
        'maintenance.blockadclicks' => 'maintenance.blockAdClicks',
        'maintenance.channelforecasting' => 'maintenance.channelForecasting',
        'maintenance.prunecompletedcampaignssummarydata' => 'maintenance.pruneCompletedCampaignsSummaryData',
        'maintenance.prunedatatables' => 'maintenance.pruneDataTables',
        'maintenance.ecpmcampaignlevels' => 'maintenance.ecpmCampaignLevels',
        'priority.instantupdate' => 'priority.instantUpdate',
        'priority.intentionaloverdelivery' => 'priority.intentionalOverdelivery',
        'priority.defaultclickratio' => 'priority.defaultClickRatio',
        'priority.defaultconversionratio' => 'priority.defaultConversionRatio',
        'performancestatistics.defaultimpressionsthreshold' => 'performanceStatistics.defaultImpressionsThreshold',
        'performancestatistics.defaultdaysintervalthreshold' => 'performanceStatistics.defaultDaysIntervalThreshold',
        'email.logoutgoing' => 'email.logOutgoing',
        'email.qmailpatch' => 'email.qmailPatch',
        'email.fromname' => 'email.fromName',
        'email.fromaddress' => 'email.fromAddress',
        'email.fromcompany' => 'email.fromCompany',
        'email.usemanagerdetails' => 'email.useManagerDetails',
        'log.methodnames' => 'log.methodNames',
        'log.linenumbers' => 'log.lineNumbers',
        'log.paramsusername' => 'log.paramsUsername',
        'log.paramspassword' => 'log.paramsPassword',
        'log.filemode' => 'log.fileMode',
        'deliverylog.enabled' => 'deliveryLog.enabled',
        'deliverylog.name' => 'deliveryLog.name',
        'deliverylog.filemode' => 'deliveryLog.fileMode',
        'deliverylog.priority' => 'deliveryLog.priority',
        'cookie.permcookieseconds' => 'cookie.permCookieSeconds',
        'cookie.maxcookiesize' => 'cookie.maxCookieSize',
        'cookie.vieweriddomain' => 'cookie.viewerIdDomain',
        'debug.senderroremails' => 'debug.sendErrorEmails',
        'debug.emailsubject' => 'debug.emailSubject',
        'debug.emailadminthreshold' => 'debug.emailAdminThreshold',
        'debug.erroroverride' => 'debug.errorOverride',
        'debug.showbacktrace' => 'debug.showBacktrace',
        'debug.disablesendemails' => 'debug.disableSendEmails',
        'var.cookietest' => 'var.cookieTest',
        'var.cachebuster' => 'var.cacheBuster',
        'var.logclick' => 'var.logClick',
        'var.viewerid' => 'var.viewerId',
        'var.viewergeo' => 'var.viewerGeo',
        'var.campaignid' => 'var.campaignId',
        'var.adid' => 'var.adId',
        'var.creativeid' => 'var.creativeId',
        'var.zoneid' => 'var.zoneId',
        'var.blockad' => 'var.blockAd',
        'var.capad' => 'var.capAd',
        'var.sessioncapad' => 'var.sessionCapAd',
        'var.blockcampaign' => 'var.blockCampaign',
        'var.capcampaign' => 'var.capCampaign',
        'var.sessioncapcampaign' => 'var.sessionCapCampaign',
        'var.blockzone' => 'var.blockZone',
        'var.capzone' => 'var.capZone',
        'var.sessioncapzone' => 'var.sessionCapZone',
        'var.lastview' => 'var.lastView',
        'var.lastclick' => 'var.lastClick',
        'var.blockloggingclick' => 'var.blockLoggingClick',
        'var.fallback' => 'var.fallBack',
        'sync.checkforupdates' => 'sync.checkForUpdates',
        'sync.sharestack' => 'sync.shareStack',
        'oacsync.protocol' => 'oacSync.protocol',
        'oacsync.host' => 'oacSync.host',
        'oacsync.path' => 'oacSync.path',
        'oacsync.httpport' => 'oacSync.httpPort',
        'oacsync.httpsport' => 'oacSync.httpsPort',
        'authentication.deleteunverifiedusersafter' => 'authentication.deleteUnverifiedUsersAfter',
        'geotargeting.showunavailable' => 'geotargeting.showUnavailable',
        'pluginpaths.packages' => 'pluginPaths.packages',
        'pluginpaths.plugins' => 'pluginPaths.plugins',
        'pluginpaths.admin' => 'pluginPaths.admin',
        'pluginpaths.var' => 'pluginPaths.var',
        'pluginsettings.enableoninstall' => 'pluginSettings.enableOnInstall',
        'pluginsettings.usemergedfunctions' => 'pluginSettings.useMergedFunctions',
        'plugins.openxbannertypes' => 'plugins.openXBannerTypes',
        'plugins.openxdeliverylimitations' => 'plugins.openXDeliveryLimitations',
        'plugins.openx3rdpartyservers' => 'plugins.openX3rdPartyServers',
        'plugins.openxreports' => 'plugins.openXReports',
        'plugins.openxdeliverycachestore' => 'plugins.openXDeliveryCacheStore',
        'plugins.openxinvocationtags' => 'plugins.openXInvocationTags',
        'plugins.openxdeliverylog' => 'plugins.openXDeliveryLog',
        'plugins.openxvideoads' => 'plugins.openXVideoAds',
        'plugins.revivemaxmindgeoip2' => 'plugins.reviveMaxMindGeoIP2',
        'plugingroupcomponents.oxhtml' => 'pluginGroupComponents.oxHtml',
        'plugingroupcomponents.oxtext' => 'pluginGroupComponents.oxText',
        'plugingroupcomponents.client' => 'pluginGroupComponents.Client',
        'plugingroupcomponents.geo' => 'pluginGroupComponents.Geo',
        'plugingroupcomponents.site' => 'pluginGroupComponents.Site',
        'plugingroupcomponents.time' => 'pluginGroupComponents.Time',
        'plugingroupcomponents.ox3rdpartyservers' => 'pluginGroupComponents.ox3rdPartyServers',
        'plugingroupcomponents.oxreportsstandard' => 'pluginGroupComponents.oxReportsStandard',
        'plugingroupcomponents.oxreportsadmin' => 'pluginGroupComponents.oxReportsAdmin',
        'plugingroupcomponents.oxcachefile' => 'pluginGroupComponents.oxCacheFile',
        'plugingroupcomponents.oxmemcached' => 'pluginGroupComponents.oxMemcached',
        'plugingroupcomponents.oxinvocationtags' => 'pluginGroupComponents.oxInvocationTags',
        'plugingroupcomponents.oxdeliverydataprepare' => 'pluginGroupComponents.oxDeliveryDataPrepare',
        'plugingroupcomponents.oxlogclick' => 'pluginGroupComponents.oxLogClick',
        'plugingroupcomponents.oxlogconversion' => 'pluginGroupComponents.oxLogConversion',
        'plugingroupcomponents.oxlogimpression' => 'pluginGroupComponents.oxLogImpression',
        'plugingroupcomponents.oxlogrequest' => 'pluginGroupComponents.oxLogRequest',
        'plugingroupcomponents.vastinlinebannertypehtml' => 'pluginGroupComponents.vastInlineBannerTypeHtml',
        'plugingroupcomponents.vastoverlaybannertypehtml' => 'pluginGroupComponents.vastOverlayBannerTypeHtml',
        'plugingroupcomponents.oxlogvast' => 'pluginGroupComponents.oxLogVast',
        'plugingroupcomponents.vastservevideoplayer' => 'pluginGroupComponents.vastServeVideoPlayer',
        'plugingroupcomponents.videoreport' => 'pluginGroupComponents.videoReport',
        'plugingroupcomponents.rvmaxmindgeoip2' => 'pluginGroupComponents.rvMaxMindGeoIP2',
        'plugingroupcomponents.rvmaxmindgeoip2maintenance' => 'pluginGroupComponents.rvMaxMindGeoIP2Maintenance',
        'audit.enabledforzonelinking' => 'audit.enabledForZoneLinking',
        'client.sniff' => 'Client.sniff',
        'deliveryhooks.postinit' => 'deliveryHooks.postInit',
        'deliveryhooks.cachestore' => 'deliveryHooks.cacheStore',
        'deliveryhooks.cacheretrieve' => 'deliveryHooks.cacheRetrieve',
        'deliveryhooks.prelog' => 'deliveryHooks.preLog',
        'deliveryhooks.logclick' => 'deliveryHooks.logClick',
        'deliveryhooks.logconversion' => 'deliveryHooks.logConversion',
        'deliveryhooks.logconversionvariable' => 'deliveryHooks.logConversionVariable',
        'deliveryhooks.logimpression' => 'deliveryHooks.logImpression',
        'deliveryhooks.logrequest' => 'deliveryHooks.logRequest',
        'deliveryhooks.logimpressionvast' => 'deliveryHooks.logImpressionVast',
        'oxcachefile.cachepath' => 'oxCacheFile.cachePath',
        'oxmemcached.memcachedservers' => 'oxMemcached.memcachedServers',
        'oxmemcached.memcachedexpiretime' => 'oxMemcached.memcachedExpireTime',
        'oxinvocationtags.isallowedasync' => 'oxInvocationTags.isAllowedAsync',
        'oxinvocationtags.isallowedadjs' => 'oxInvocationTags.isAllowedAdjs',
        'oxinvocationtags.isallowedadframe' => 'oxInvocationTags.isAllowedAdframe',
        'oxinvocationtags.isallowedadlayer' => 'oxInvocationTags.isAllowedAdlayer',
        'oxinvocationtags.isallowedadview' => 'oxInvocationTags.isAllowedAdview',
        'oxinvocationtags.isallowedadviewnocookies' => 'oxInvocationTags.isAllowedAdviewnocookies',
        'oxinvocationtags.isallowedlocal' => 'oxInvocationTags.isAllowedLocal',
        'oxinvocationtags.isallowedpopup' => 'oxInvocationTags.isAllowedPopup',
        'oxinvocationtags.isallowedxmlrpc' => 'oxInvocationTags.isAllowedXmlrpc',
        'vastoverlaybannertypehtml.isvastoverlayastextenabled' => 'vastOverlayBannerTypeHtml.isVastOverlayAsTextEnabled',
        'vastoverlaybannertypehtml.isvastoverlayasswfenabled' => 'vastOverlayBannerTypeHtml.isVastOverlayAsSwfEnabled',
        'vastoverlaybannertypehtml.isvastoverlayasimageenabled' => 'vastOverlayBannerTypeHtml.isVastOverlayAsImageEnabled',
        'vastoverlaybannertypehtml.isvastoverlayashtmlenabled' => 'vastOverlayBannerTypeHtml.isVastOverlayAsHtmlEnabled',
        'vastservevideoplayer.isautoplayofvideoinopenxadmintoolenabled' => 'vastServeVideoPlayer.isAutoPlayOfVideoInOpenXAdminToolEnabled',
        'rvmaxmindgeoip2.mmdb_paths' => 'rvMaxMindGeoIP2.mmdb_paths',
        'rvmaxmindgeoip2.license_key' => 'rvMaxMindGeoIP2.license_key',
    ];

    private function normalizeParameterName($name)
    {
        if (isset($this->normalizedParameterNames[$normalizedName = strtolower($name)]) || isset($this->parameters[$normalizedName]) || array_key_exists($normalizedName, $this->parameters)) {
            $normalizedName = isset($this->normalizedParameterNames[$normalizedName]) ? $this->normalizedParameterNames[$normalizedName] : $normalizedName;
            if ((string) $name !== $normalizedName) {
                @trigger_error(sprintf('Parameter names will be made case sensitive in Symfony 4.0. Using "%s" instead of "%s" is deprecated since Symfony 3.4.', $name, $normalizedName), E_USER_DEPRECATED);
            }
        } else {
            $normalizedName = $this->normalizedParameterNames[$normalizedName] = (string) $name;
        }

        return $normalizedName;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return [
            'openads.installed' => '1',
            'openads.requireSSL' => '1',
            'openads.sslPort' => '443',
            'ui.enabled' => '1',
            'ui.applicationName' => '',
            'ui.headerFilePath' => '',
            'ui.footerFilePath' => '',
            'ui.logoFilePath' => '',
            'ui.headerForegroundColor' => '',
            'ui.headerBackgroundColor' => '',
            'ui.headerActiveTabColor' => '',
            'ui.headerTextColor' => '',
            'ui.gzipCompression' => '1',
            'ui.supportLink' => '',
            'ui.combineAssets' => '1',
            'ui.dashboardEnabled' => '1',
            'ui.hideNavigator' => '',
            'ui.zoneLinkingStatistics' => '1',
            'ui.disableDirectSelection' => '1',
            'database.type' => 'mysqli',
            'database.host' => 'localhost',
            'database.socket' => '',
            'database.port' => '3306',
            'database.username' => 'root',
            'database.password' => 'J@V@5suck',
            'database.name' => 'mediaload_ads',
            'database.persistent' => '',
            'database.mysql4_compatibility' => '1',
            'database.protocol' => 'tcp',
            'database.compress' => '',
            'database.ssl' => '',
            'database.capath' => '',
            'database.ca' => '',
            'databaseCharset.checkComplete' => '1',
            'databaseCharset.clientCharset' => '',
            'databaseMysql.statisticsSortBufferSize' => '',
            'databasePgsql.schema' => '',
            'webpath.admin' => 'ads.groupincorp.com/www/admin',
            'webpath.delivery' => 'ads.groupincorp.com/www/delivery',
            'webpath.deliverySSL' => 'ads.groupincorp.com/www/delivery',
            'webpath.images' => 'ads.groupincorp.com/www/images',
            'webpath.imagesSSL' => 'ads.groupincorp.com/www/images',
            'file.asyncjs' => 'asyncjs.php',
            'file.asyncjsjs' => 'async.js',
            'file.asyncspc' => 'asyncspc.php',
            'file.click' => 'ck.php',
            'file.conversionvars' => 'tv.php',
            'file.content' => 'ac.php',
            'file.conversion' => 'ti.php',
            'file.conversionjs' => 'tjs.php',
            'file.flash' => 'fl.js',
            'file.google' => 'ag.php',
            'file.frame' => 'afr.php',
            'file.image' => 'ai.php',
            'file.js' => 'ajs.php',
            'file.layer' => 'al.php',
            'file.log' => 'lg.php',
            'file.popup' => 'apu.php',
            'file.view' => 'avw.php',
            'file.xmlrpc' => 'axmlrpc.php',
            'file.local' => 'alocal.php',
            'file.frontcontroller' => 'fc.php',
            'file.singlepagecall' => 'spc.php',
            'file.spcjs' => 'spcjs.php',
            'file.xmlrest' => 'ax.php',
            'store.mode' => '0',
            'store.webDir' => '/var/www/html/www/images',
            'store.ftpHost' => '',
            'store.ftpPath' => '',
            'store.ftpUsername' => '',
            'store.ftpPassword' => '',
            'store.ftpPassive' => '',
            'allowedBanners.sql' => '1',
            'allowedBanners.web' => '1',
            'allowedBanners.url' => '1',
            'allowedBanners.html' => '1',
            'allowedBanners.text' => '1',
            'allowedBanners.video' => '1',
            'delivery.cacheExpire' => '1200',
            'delivery.cacheStorePlugin' => 'deliveryCacheStore:oxCacheFile:oxCacheFile',
            'delivery.cachePath' => '',
            'delivery.acls' => '1',
            'delivery.aclsDirectSelection' => '1',
            'delivery.obfuscate' => '',
            'delivery.execPhp' => '',
            'delivery.ctDelimiter' => '__',
            'delivery.chDelimiter' => ',',
            'delivery.keywords' => '',
            'delivery.cgiForceStatusHeader' => '',
            'delivery.clicktracking' => '',
            'delivery.ecpmSelectionRate' => '0.9',
            'delivery.enableControlOnPureCPM' => '1',
            'delivery.assetClientCacheExpire' => '3600',
            'defaultBanner.imageUrl' => '',
            'p3p.policies' => '1',
            'p3p.compactPolicy' => 'CUR ADM OUR NOR STA NID',
            'p3p.policyLocation' => '',
            'privacy.disableViewerId' => '1',
            'privacy.anonymiseIp' => '1',
            'graphs.ttfDirectory' => '',
            'graphs.ttfName' => '',
            'logging.adRequests' => '',
            'logging.adImpressions' => '1',
            'logging.adClicks' => '1',
            'logging.trackerImpressions' => '1',
            'logging.reverseLookup' => '',
            'logging.proxyLookup' => '1',
            'logging.defaultImpressionConnectionWindow' => '',
            'logging.defaultClickConnectionWindow' => '',
            'logging.ignoreHosts' => '',
            'logging.ignoreUserAgents' => '',
            'logging.enforceUserAgents' => '',
            'logging.blockAdClicksWindow' => '0',
            'logging.blockInactiveBanners' => '1',
            'maintenance.autoMaintenance' => '1',
            'maintenance.timeLimitScripts' => '1800',
            'maintenance.operationInterval' => '60',
            'maintenance.blockAdImpressions' => '0',
            'maintenance.blockAdClicks' => '0',
            'maintenance.channelForecasting' => '',
            'maintenance.pruneCompletedCampaignsSummaryData' => '',
            'maintenance.pruneDataTables' => '1',
            'maintenance.ecpmCampaignLevels' => '9|8|7|6',
            'priority.instantUpdate' => '1',
            'priority.intentionalOverdelivery' => '0',
            'priority.defaultClickRatio' => '0.005',
            'priority.defaultConversionRatio' => '0.0001',
            'priority.randmax' => '2147483647',
            'performanceStatistics.defaultImpressionsThreshold' => '10000',
            'performanceStatistics.defaultDaysIntervalThreshold' => '30',
            'table.prefix' => 'rv_',
            'table.type' => 'MYISAM',
            'table.account_preference_assoc' => 'account_preference_assoc',
            'table.account_user_assoc' => 'account_user_assoc',
            'table.account_user_permission_assoc' => 'account_user_permission_assoc',
            'table.accounts' => 'accounts',
            'table.acls' => 'acls',
            'table.acls_channel' => 'acls_channel',
            'table.ad_category_assoc' => 'ad_category_assoc',
            'table.ad_zone_assoc' => 'ad_zone_assoc',
            'table.affiliates' => 'affiliates',
            'table.affiliates_extra' => 'affiliates_extra',
            'table.agency' => 'agency',
            'table.application_variable' => 'application_variable',
            'table.audit' => 'audit',
            'table.banners' => 'banners',
            'table.campaigns' => 'campaigns',
            'table.campaigns_trackers' => 'campaigns_trackers',
            'table.category' => 'category',
            'table.channel' => 'channel',
            'table.clients' => 'clients',
            'table.data_intermediate_ad' => 'data_intermediate_ad',
            'table.data_intermediate_ad_connection' => 'data_intermediate_ad_connection',
            'table.data_intermediate_ad_variable_value' => 'data_intermediate_ad_variable_value',
            'table.data_raw_ad_click' => 'data_raw_ad_click',
            'table.data_raw_ad_impression' => 'data_raw_ad_impression',
            'table.data_raw_ad_request' => 'data_raw_ad_request',
            'table.data_raw_tracker_impression' => 'data_raw_tracker_impression',
            'table.data_raw_tracker_variable_value' => 'data_raw_tracker_variable_value',
            'table.data_summary_ad_hourly' => 'data_summary_ad_hourly',
            'table.data_summary_ad_zone_assoc' => 'data_summary_ad_zone_assoc',
            'table.data_summary_channel_daily' => 'data_summary_channel_daily',
            'table.data_summary_zone_impression_history' => 'data_summary_zone_impression_history',
            'table.images' => 'images',
            'table.log_maintenance_forecasting' => 'log_maintenance_forecasting',
            'table.log_maintenance_priority' => 'log_maintenance_priority',
            'table.log_maintenance_statistics' => 'log_maintenance_statistics',
            'table.password_recovery' => 'password_recovery',
            'table.placement_zone_assoc' => 'placement_zone_assoc',
            'table.preferences' => 'preferences',
            'table.session' => 'session',
            'table.targetstats' => 'targetstats',
            'table.trackers' => 'trackers',
            'table.tracker_append' => 'tracker_append',
            'table.userlog' => 'userlog',
            'table.users' => 'users',
            'table.variables' => 'variables',
            'table.variable_publisher' => 'variable_publisher',
            'table.zones' => 'zones',
            'email.logOutgoing' => '1',
            'email.headers' => '',
            'email.qmailPatch' => '',
            'email.fromName' => '',
            'email.fromAddress' => 'rath.panha.rp@gmail.com',
            'email.fromCompany' => '',
            'email.useManagerDetails' => '',
            'log.enabled' => '1',
            'log.methodNames' => '',
            'log.lineNumbers' => '',
            'log.type' => 'file',
            'log.name' => 'debug.log',
            'log.priority' => '6',
            'log.ident' => 'OX',
            'log.paramsUsername' => '',
            'log.paramsPassword' => '',
            'log.fileMode' => '0644',
            'deliveryLog.enabled' => '',
            'deliveryLog.name' => 'delivery.log',
            'deliveryLog.fileMode' => '0644',
            'deliveryLog.priority' => '6',
            'cookie.permCookieSeconds' => '31536000',
            'cookie.maxCookieSize' => '2048',
            'cookie.domain' => '',
            'cookie.viewerIdDomain' => '',
            'debug.logfile' => '',
            'debug.production' => '1',
            'debug.sendErrorEmails' => '',
            'debug.emailSubject' => 'Error from Revive Adserver',
            'debug.email' => 'email@example.com',
            'debug.emailAdminThreshold' => '3',
            'debug.errorOverride' => '1',
            'debug.showBacktrace' => '',
            'debug.disableSendEmails' => '',
            'var.prefix' => 'OA_',
            'var.cookieTest' => 'ct',
            'var.cacheBuster' => 'cb',
            'var.channel' => 'source',
            'var.dest' => 'oadest',
            'var.logClick' => 'log',
            'var.n' => 'n',
            'var.params' => 'oaparams',
            'var.viewerId' => 'OAID',
            'var.viewerGeo' => 'OAGEO',
            'var.campaignId' => 'campaignid',
            'var.adId' => 'bannerid',
            'var.creativeId' => 'cid',
            'var.zoneId' => 'zoneid',
            'var.blockAd' => 'OABLOCK',
            'var.capAd' => 'OACAP',
            'var.sessionCapAd' => 'OASCAP',
            'var.blockCampaign' => 'OACBLOCK',
            'var.capCampaign' => 'OACCAP',
            'var.sessionCapCampaign' => 'OASCCAP',
            'var.blockZone' => 'OAZBLOCK',
            'var.capZone' => 'OAZCAP',
            'var.sessionCapZone' => 'OASZCAP',
            'var.vars' => 'OAVARS',
            'var.trackonly' => 'trackonly',
            'var.openads' => 'openads',
            'var.lastView' => 'OXLIA',
            'var.lastClick' => 'OXLCA',
            'var.blockLoggingClick' => 'OXBLC',
            'var.fallBack' => 'oxfb',
            'var.trace' => 'OXTR',
            'var.product' => 'revive',
            'lb.enabled' => '',
            'lb.type' => 'mysql',
            'lb.host' => 'localhost',
            'lb.port' => '3306',
            'lb.username' => '',
            'lb.password' => '',
            'lb.name' => '',
            'lb.persistent' => '',
            'sync.checkForUpdates' => '1',
            'sync.shareStack' => '1',
            'oacSync.protocol' => 'https',
            'oacSync.host' => 'sync.revive-adserver.com',
            'oacSync.path' => '/xmlrpc.php',
            'oacSync.httpPort' => '80',
            'oacSync.httpsPort' => '443',
            'authentication.type' => 'internal',
            'authentication.deleteUnverifiedUsersAfter' => '2419200',
            'geotargeting.type' => '',
            'geotargeting.showUnavailable' => '',
            'pluginPaths.packages' => '/plugins/etc/',
            'pluginPaths.plugins' => '/plugins/',
            'pluginPaths.admin' => '/www/admin/plugins/',
            'pluginPaths.var' => '/var/plugins/',
            'pluginSettings.enableOnInstall' => '1',
            'pluginSettings.useMergedFunctions' => '1',
            'plugins.openXBannerTypes' => '1',
            'plugins.openXDeliveryLimitations' => '1',
            'plugins.openX3rdPartyServers' => '1',
            'plugins.openXReports' => '1',
            'plugins.openXDeliveryCacheStore' => '1',
            'plugins.openXInvocationTags' => '1',
            'plugins.openXDeliveryLog' => '1',
            'plugins.openXVideoAds' => '1',
            'plugins.reviveMaxMindGeoIP2' => '1',
            'pluginGroupComponents.oxHtml' => '1',
            'pluginGroupComponents.oxText' => '1',
            'pluginGroupComponents.Client' => '1',
            'pluginGroupComponents.Geo' => '1',
            'pluginGroupComponents.Site' => '1',
            'pluginGroupComponents.Time' => '1',
            'pluginGroupComponents.ox3rdPartyServers' => '1',
            'pluginGroupComponents.oxReportsStandard' => '1',
            'pluginGroupComponents.oxReportsAdmin' => '1',
            'pluginGroupComponents.oxCacheFile' => '1',
            'pluginGroupComponents.oxMemcached' => '1',
            'pluginGroupComponents.oxInvocationTags' => '1',
            'pluginGroupComponents.oxDeliveryDataPrepare' => '1',
            'pluginGroupComponents.oxLogClick' => '1',
            'pluginGroupComponents.oxLogConversion' => '1',
            'pluginGroupComponents.oxLogImpression' => '1',
            'pluginGroupComponents.oxLogRequest' => '1',
            'pluginGroupComponents.vastInlineBannerTypeHtml' => '1',
            'pluginGroupComponents.vastOverlayBannerTypeHtml' => '1',
            'pluginGroupComponents.oxLogVast' => '1',
            'pluginGroupComponents.vastServeVideoPlayer' => '1',
            'pluginGroupComponents.videoReport' => '1',
            'pluginGroupComponents.rvMaxMindGeoIP2' => '1',
            'pluginGroupComponents.rvMaxMindGeoIP2Maintenance' => '1',
            'audit.enabled' => '1',
            'audit.enabledForZoneLinking' => '',
            'Client.sniff' => '1',
            'deliveryHooks.postInit' => 'deliveryLimitations:Client:initClientData',
            'deliveryHooks.cacheStore' => 'deliveryCacheStore:oxCacheFile:oxCacheFile|deliveryCacheStore:oxMemcached:oxMemcached',
            'deliveryHooks.cacheRetrieve' => 'deliveryCacheStore:oxCacheFile:oxCacheFile|deliveryCacheStore:oxMemcached:oxMemcached',
            'deliveryHooks.preLog' => 'deliveryDataPrepare:oxDeliveryDataPrepare:dataCommon|deliveryDataPrepare:oxDeliveryDataPrepare:dataPageInfo|deliveryDataPrepare:oxDeliveryDataPrepare:dataUserAgent',
            'deliveryHooks.logClick' => 'deliveryDataPrepare:oxDeliveryDataPrepare:dataCommon|deliveryLog:oxLogClick:logClick',
            'deliveryHooks.logConversion' => 'deliveryLog:oxLogConversion:logConversion',
            'deliveryHooks.logConversionVariable' => 'deliveryLog:oxLogConversion:logConversionVariable',
            'deliveryHooks.logImpression' => 'deliveryDataPrepare:oxDeliveryDataPrepare:dataCommon|deliveryLog:oxLogImpression:logImpression',
            'deliveryHooks.logRequest' => 'deliveryDataPrepare:oxDeliveryDataPrepare:dataCommon|deliveryLog:oxLogRequest:logRequest',
            'deliveryHooks.logImpressionVast' => 'deliveryLog:oxLogVast:logImpressionVast',
            'oxCacheFile.cachePath' => '',
            'oxMemcached.memcachedServers' => '',
            'oxMemcached.memcachedExpireTime' => '',
            'oxInvocationTags.isAllowedAsync' => '1',
            'oxInvocationTags.isAllowedAdjs' => '1',
            'oxInvocationTags.isAllowedAdframe' => '1',
            'oxInvocationTags.isAllowedAdlayer' => '1',
            'oxInvocationTags.isAllowedAdview' => '0',
            'oxInvocationTags.isAllowedAdviewnocookies' => '1',
            'oxInvocationTags.isAllowedLocal' => '1',
            'oxInvocationTags.isAllowedPopup' => '0',
            'oxInvocationTags.isAllowedXmlrpc' => '0',
            'vastOverlayBannerTypeHtml.isVastOverlayAsTextEnabled' => '1',
            'vastOverlayBannerTypeHtml.isVastOverlayAsSwfEnabled' => '1',
            'vastOverlayBannerTypeHtml.isVastOverlayAsImageEnabled' => '1',
            'vastOverlayBannerTypeHtml.isVastOverlayAsHtmlEnabled' => '1',
            'vastServeVideoPlayer.isAutoPlayOfVideoInOpenXAdminToolEnabled' => '0',
            'rvMaxMindGeoIP2.mmdb_paths' => '',
            'rvMaxMindGeoIP2.license_key' => '',
        ];
    }
}
