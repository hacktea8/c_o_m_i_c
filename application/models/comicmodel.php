<?php
require_once 'modelbase.php';

class Comicmodel extends Modelbase{
        public $_table = 'page';
        public $_pagecol = '`pid`, `vid`, `cid`, `img`, `isimg`, `isadult`, `hits`, `rtime`';
        public $_volcol = '`vid`, `cid`, `vnum`, `pageset`, `isimg`, `firstpid`, `prepid`, `nextpid`, `isadult`, `hits`, `rtime` ';
        public $_pagesetcol = '`pid`, `img`, `isadult`, `hits`, `rtime`';
        public $_comiccol = ' `cid`,`name`,`cover`,`author`,`detail`,`letter`,`relatecomic`,`state`,`hits`,`volset`,`atime`,`rtime` ';

        public function __construct(){
                parent::__construct();

        }
        public function getTable($vid){
                return 'page'.($vid % 10);
        }
        public function getComicListByLetter($letter,$order,$page){
                $sql = sprintf("");
        }                
}
