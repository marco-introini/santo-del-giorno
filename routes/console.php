<?php

Schedule::command('backup:run')
    ->weeklyOn(1, '03:00');
