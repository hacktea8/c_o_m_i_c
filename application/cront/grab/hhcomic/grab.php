<?php

define('ROOTPATH',dirname(dirname(__FILE__)));

require_once ROOTPATH.'/config.php';
require_once ROOTPATH.'/hhcomic/config.php';
require_once ROOTPATH.'/hhcomic/function.php';
require_once ROOTPATH.'/phpcurl.php';
require_once ROOTPATH.'/model.php';

$mhcurl = new CurlModel();
$mhcurl->config['cookie'] = 'cookiehhcomic';

$model = new Model();

/*********** Get Cate **************
$catelist = getmhcate($siteinfo['domain']);
var_dump($catelist);exit;
/*********** End Cate **************/

/*********** Start *****************/
$listurl = sprintf('%s'.$siteinfo['listurl'],$siteinfo['domain'],1,1);
//$info = getmhlist($listurl);
//$comicurl = sprintf('%s'.$siteinfo['comicurl'],$siteinfo['domain'],1819270);
$comicurl = 'http://hhcomic.com//comic/1821007/';
$comicdata['name'] = '大奥之樱';
//getmhdetail($comicurl);
//$info = $comicdata;
$info = getmhvols($comicurl);//exit;
//$volurl = sprintf('%s'.$siteinfo['volurl'],$siteinfo['domain'],'1819270','hh138263.htm?s=11');
//var_dump($volurl);exit;
//$info = getmhpageinfo($volurl);
//$info = getmhserver();
var_dump($info);exit;
/*********** END list **************/
$catelist = $model->getAllcate();
var_dump($catelist);exit;
