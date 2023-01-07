<?php

namespace App\Interface;

interface PartieInterface
{
    public function addParticipant(object $participant) : object;
}