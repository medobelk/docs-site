<?php
/**
 * Description of DB
 *
 * @author andrey
 */
class DB implements IDB{
        /**
         * Подключение
         * @var Hendler
         */
        static $dbh = null;

        /**
         * Выбранная база
         * @var Hendler
         */
        static $dbs = null;

        /**
         * Хендл результата
         * @var Hendler
         */
        static $result = null;

        /**
         * Текущая строка
         * @var Array
         */
        static $row = null;

        /**
         *Возвратить кол-во строк в результате выборки
         *
         * @return Integer кол-во записей в выборке
         */
        public function getRowsCount() {
            return mysql_num_rows(self::$result);
        }

        /**
         * Получить первую строку результата выборки
         *
         * @return array асоциативный массив данных, строка таблицы
         */
        public function first() {
            self::$row = mysql_fetch_array(self::$result);
            return self::$row;
        }

        /**
         * Получить результат выборки
         *
         * @return array асоциативный массив данных, строка таблицы
         */
        public function fetch() {
            $cnt = $this->getRowsCount();
            $arr = array();
            for ($i = 0; $i < $cnt; $i++) {
                $arr[] = mysql_fetch_array(self::$result);
            }
            return $arr;
        }

        /**
         * Запрос к БД
         *
         * @param String $str Строка SQL запроса
         */
        public function query(IQuery $str) {
            if (self::$dbs===null){
                self::set_connect();
            }
            if (Core::$_CONFIG['db']['sqlDebug']){
                Core::logged($str->getPlainQuery(), "db_querys");
            }
            self::$result
                = mysql_query( $str->getPlainQuery() , self::$dbh );
            if (mysql_errno(self::$dbh)){
                error_log("MySQL database driver error. Query error. "
                        .mysql_error(self::$dbh));
                return null;
            }
            if (strpos(strtolower($str->getPlainQuery()), "insert")>-1){
                return mysql_insert_id();
            }
            return $this;
        }

        /**
         * Создаем подключение
         *
         */
        public function  set_connect($par) {//Подключаемса и обрабатываем ошибки подключения
            self::$dbh = mysql_connect($par["host"], $par["user_name"],
                                       $par["password"], true);
            self::$dbs = mysql_select_db($par["name"], self::$dbh);
            if (!self::$dbh) {error_log("MySQL database driver connection error.");}
            if (!self::$dbs) {error_log("MySQL database driver connection error. Missing DB select.");}
            mysql_query("SET NAMES ".$par["encoding"], self::$dbh);
            if (mysql_errno(self::$dbh)){error_log("MySQL database driver connection error. "
                            .mysql_error(self::$dbh));}
        }

        /**
         * Отключаемса от базы
         */
        public function kill_connect() {
                mysql_close(self::$dbh);
        }

        public function __construct($par = null) {
            $params = array();
            if (is_array($par)){
                $params = $par;
            } else {
                $params = Core::$_CONFIG['db'];
            }
            $this->set_connect($par);
        }
}