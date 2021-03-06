<?php
require_once 'modelbase.php';

class Usermodel extends Modelbase{
        public $_table = 'page';
        public $_pagecol = '`pid`, `vid`, `cid`, `img`, `isimg`, `isadult`, `hits`, `rtime`';
        public $_volcol = '`vid`, `cid`, `vnum`, `pageset`, `isimg`, `firstpid`, `prepid`, `nextpid`, `isadult`, `hits`, `rtime` ';
        public $_pagesetcol = '`pid`, `img`, `isadult`, `hits`, `rtime`';
        public $_comiccol = ' `cid`,`name`,`cover`,`author`,`detail`,`letter`,`relatecomic`,`state`,`hits`,`volset`,`atime`,`rtime` ';

        public function __construct(){
                parent::__construct();

        }
        public function getUserInfo($uinfo){
                if( !isset($uinfo['uid']) || !$uinfo['uid']){
                   return array('uid'=>0,'uname'=>'','isvip'=>0);
                }
                $sql = sprintf("SELECT * FROM `user` WHERE `uid`=%d LIMIT 1", $uinfo['uid']);
                $row = $this->db->query($sql)->row_array();
                $uinfo['isvip'] = 0;
                foreach($uinfo['groups'] as $group){
                  if($group == 16){
                    $uinfo['isvip'] = 1;
                    break;
                  }elseif($group == 24){
                    $uinfo['isvip'] = 2;
                    break;
                  }
                }
                $ip = get_client_ip();
                $row['groupid'] = $uinfo['groupid'];
                $row['groups'] = $uinfo['groups'];
                if(isset($row['uid'])){
                  $update = array();
                  if($row['loginip'] != $ip){
                     $row['loginip'] = $update['loginip'] = $ip;
                  }
                  if($row['logintime'] != date('Ymd')){
                     $row['logintime'] = $update['logintime'] = date('Ymd');
                  }
                  if($row['isvip'] != $uinfo['isvip']){
                     $row['isvip'] = $update['isvip'] = $uinfo['isvip'];
                  }
                  if($row['uname'] != $uinfo['username']){
                     $row['uname'] = $update['uname'] = $uinfo['username'];
                  }
                  if(count($update)){
                     $where = sprintf(" `uid` =%d LIMIT 1", $uinfo['uid']);
                     $sql = $this->db->update_string('user',$update,$where);
                     $this->db->query($sql);
                  }
                  return $row;
                }else{
                  $sql = sprintf("INSERT INTO `user`(`uid`, `uname`, `isvip`, `loginip`, `logintime`, `collectcount`, `bmarkcount`) VALUES (%d,'%s',%d,'%s',%d,0,0)",$uinfo['uid'],mysql_real_escape_string($uinfo['uname']),$uinfo['isvip'],mysql_real_escape_string($ip),date('Ymd'));
                  $this->db->query($sql);
                }
                return $uinfo;
        }
                
}
