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
foreach($catelist[1] as $k => $v){
  $ourl = $catelist[0][$k];
  $cname = preg_replace('#<.+>#Uis','',$v);
  $model->getCateByname($cname,$ourl);
}
var_dump($catelist);exit;
/*********** End Cate **************/

/*********** Start *****************
//getmhlist('http://www.cococomic.com/comiclist/1/1');
//getmhvols('http://www.cococomic.com/comic/20355/');
//$page = getmhpageinfo('http://www.cococomic.com/comic/20355/142908/');
//$page = getmhserver();
$page = strtoupper(substr(Pinyin('01超越想像(Over Image,超異能游戲)'),0,1));
var_dump($page);exit;
/*********** END list **************/

