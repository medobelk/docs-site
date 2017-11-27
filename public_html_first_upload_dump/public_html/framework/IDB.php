<?php
/**
 *
 * @author andrey
 */
interface IDB {
    /**
     *Возвратить кол-во строк в результате выборки
     *
     * @return Integer кол-во записей в выборке
     */
    function getRowsCount();

    /**
     * Получить  результат выборки
     *
     * @return array асоциативный массив данных, строка таблицы
     */
    function fetch();

    /**
     * Получить первый результат выборки
     *
     * @return array асоциативный массив данных, строка таблицы
     */
    function first();

    /**
     * Запрос к БД
     *
     * @param String $str Строка SQL запроса
     */
    function query(IQuery $str);

    /**
     * Создаем подключение
     *
     */
    function  set_connect($par);

    /**
     * Отключаемса от базы
     */
    function kill_connect();
}