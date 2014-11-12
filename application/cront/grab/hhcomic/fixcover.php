<?php

define('ROOTPATH',dirname(dirname(__FILE__)).'/');

require_once ROOTPATH.'/config.php';
require_once ROOTPATH.'/function.php';
require_once ROOTPATH.'/hhcomic/config.php';
require_once ROOTPATH.'/hhcomic/function.php';
require_once ROOTPATH.'/phpcurl.php';
require_once ROOTPATH.'/model.php';

$pattern = '/hhcomic/'.basename(__FILE__);
require_once ROOTPATH.'/hhcomic/singleProcess.php';

$mhcurl = new CurlModel();
$mhcurl->config['cookie'] = 'cookieqhhcomic';

$imgcurl = new CurlModel();
$imgcurl->config['cookie'] = 'cookieqimg';

$model = new Model();

$curSite = $sitetype[2];
define('S_CHARSET','GBK');

$list = $model->getNoneCoverList(4,30);
foreach($list as $v){
 $imgurl = sprintf($curSite['domain'].$curSite['comicurl'],$v['ourl']);
//echo $imgurl,"\n";exit;
 $dwdata = array('url'=>$imgurl,'referer'=>$curSite['domain']);
 $html = getHtml($dwdata);;
 preg_match('# <td width="176" rowspan="2" ><img src="([^"]+)" alt="[^"]+"[^>]* width="165" height="225" style="[^"]*" /></td>#Uis',$html,$match);
 //var_dump($match);exit;
 $imgurl = @$match[1];
 $updata = array('imgurl'=>$imgurl
 ,'referer'=>$curSite['domain']
 );
 $r = upload2Ttk($updata);
 $setdata = array('isimg'=>14);
 if(1 == $r['flag']){
  $setdata['isimg'] = 1;
  $setdata['host'] = $r['host'];
  $setdata['cover'] = $r['key'];
 }else{
  echo $imgurl,"\n";
  //var_dump($r);exit;
 }
 echo "Current Fix Comic id $v[id] \n";
 $model->updateComicInfo($setdata,$v['id']);
//exit;
 sleep(6);
}
