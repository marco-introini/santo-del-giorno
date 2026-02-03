<?php

Schedule::command('backup:run')
    ->weeklyOn(1, '08:00');
