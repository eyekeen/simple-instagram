<?php

namespace App\Controllers;


use App\Models\Report;
use App\Application\Router\Redirect;
use App\Application\Request\Request;

class ContactsControlle
{
    public function submit(Request $request): void
    {
        $report = new Report();
        $report->setEmail($request->post('email'));
        $report->setSubject($request->post('subject'));
        $report->setMessage(trim($request->post('message')));
        
        $report->store();

        Redirect::to('/contacts');
    }

}