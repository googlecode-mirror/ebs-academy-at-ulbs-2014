<?php
unset($_SESSION['uid']);
unset($_SESSION['type']);
session_destroy();
redirect('main/index');