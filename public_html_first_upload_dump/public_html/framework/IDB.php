<?php
/**
 *
 * @author andrey
 */
interface IDB {
    /**
     *���������� ���-�� ����� � ���������� �������
     *
     * @return Integer ���-�� ������� � �������
     */
    function getRowsCount();

    /**
     * ��������  ��������� �������
     *
     * @return array ������������ ������ ������, ������ �������
     */
    function fetch();

    /**
     * �������� ������ ��������� �������
     *
     * @return array ������������ ������ ������, ������ �������
     */
    function first();

    /**
     * ������ � ��
     *
     * @param String $str ������ SQL �������
     */
    function query(IQuery $str);

    /**
     * ������� �����������
     *
     */
    function  set_connect($par);

    /**
     * ����������� �� ����
     */
    function kill_connect();
}