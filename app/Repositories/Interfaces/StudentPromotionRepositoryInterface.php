<?php

namespace App\Repositories\Interfaces;

interface StudentPromotionRepositoryInterface
{
    //Index Promotion
    public function index();
    //Store Promotion
    public function Store_Promotion($request);
    //Create Promotion
    public function Create_Promotion();
    //Delete Promotion
    public function Delete_Promotion($request);
}
