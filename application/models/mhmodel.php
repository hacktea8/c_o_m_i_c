<?php
require_once 'modelbase.php';

class Mhmodel extends Modelbase{
        public $_table = 'page';
        public $_pagecol = '`pid`, `vid`, `cid`, `img`, `isimg`, `isadult`, `hits`, `rtime`';
        public $_volcol = '`vid`, `cid`, `vnum`, `pageset`, `isimg`, `firstpid`, `prepid`, `nextpid`, `isadult`, `hits`, `rtime` ';
        public $_pagesetcol = '`pid`, `img`, `isadult`, `hits`, `rtime`';
        public $_comiccol = ' `cid`,`name`,`cover`,`author`,`detail`,`letter`,`relatecomic`,`state`,`hits`,`volset`,`atime`,`rtime` ';
        public $_cacheType = array('hotcomic' =>1);
        public function __construct(){
                parent::__construct();

        }
        public function getTable($vid){
                return 'page'.($vid % 10);
        }
        public function getHotComics(){
                $sql = sprintf("SELECT * FROM `cacheconfig` WHERE `type`=%d", $this->_cacheType['hotcomic']);
                return $this->db->query($sql)->result_array();
        }
        public function getNewComics(){

        }
        public function getHotSerialComics(){
               
        } 
        public function getClassicEndComics(){
               
        }
        public function getNewGroundComics(){
               
        }
        public function getFullcolorChoiceComics(){
                
        }
        public function getComicsHitsRank(){
               
        }
        public function getHotComicsRenew(){
               
        }
        public function getComicsLetterList(){
              
        }
        public function getNewRenewComics(){
              
        } 
        public function getNewComicsHitsRank(){
               
        }
        
}
