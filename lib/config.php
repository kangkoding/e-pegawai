<?php
session_start();
define("NOW",date('his'));
$db = db();
function db(){
    $konek = new mysqli("localhost","root","","projek");
    return $konek;
}
function _select($table,$where=[],$order=false){
    return queryBuilder("select",$table,$where,[],false,false,$order);
}
function _update($table,$set,$where){
    return queryBuilder("update",$table,$where,$set);
}
function _delete($table,$where){
    return queryBuilder("delete",$table,$where);
}
function _insert($table,$set){
    return queryBuilder("insert",$table,[],$set);
}
function queryBuilder($opt,$table,$where=[],$set=[],$logic=false,$like=false,$order=false){
    GLOBAL $db;
    $tmp_query = "";
    $tmp_like = "=";
    $tmp_count = 1;
    if(!$logic)
        $logic = "AND";
    if($like)
        $tmp_like = "LIKE";
    if($opt=="select")
        $tmp_query .= "SELECT * FROM ";
    else if($opt=="insert")
        $tmp_query .= "INSERT INTO ";
    else if($opt=="update")
        $tmp_query .= "UPDATE ";
    else if($opt=="delete")
        $tmp_query .= "DELETE FROM ";
    $tmp_query .= $table;
    if($opt == "insert" || $opt == "update"){
        $tmp_query .= " SET ";
        foreach($set as $key => $value){
            $tmp_query .= "$key='$value',";
        }
        $tmp_query = substr($tmp_query,0,-1);
    }
    if($opt != "insert"){
        $tmp_query .= " WHERE ";
        if(count($where) == 0)
            $tmp_query .= "1";
        foreach($where as $key => $value){
            $tmp_query .= "$key $tmp_like '$value'";
            if(count($where) > $tmp_count){
                $tmp_query .= " ".$logic." ";
                $tmp_count++;
            }
        }
    }
    if($opt == "select" && $order != false)
        $tmp_query .= " ".$order;
    return $db->query($tmp_query);
}
function _redir($x){
    echo "<meta http-equiv='refresh' content='0; url=$x'>";
}
function validasi($table,$where){
    $cek = _select($table,$where)->num_rows;
    if($cek == 0)
        return false;
    else
        return true;
}
