<?php


namespace App\Http\Services;


interface ServiceInterface
{
    function getAll();
    function findByID($id);
    function add($request, $obj);
    function delete($obj);
    function update($request, $obj = null);
}
