<?php

namespace App\Repositories\Interfaces;

interface QuizzRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

}
