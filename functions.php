<?php
    function navItem(string $url, string $title, string $linkClass): string {
        $class = 'nav-item';
        if ($url === $_SERVER['SCRIPT_NAME']) {
            $class .= ' active';
        }

        return <<<HTML
                <li class="list-unstyled $class">
                    <a class="$linkClass" href="$url">$title</a>
                </li>
HTML;
    }

    function navMenu(string $class = ''): string {
        return  navItem('/index.php', 'Home', $class) .
                navItem('/contact.php', 'Contact', $class) .
                navItem('/menu.php', 'Menu', $class) .
                navItem('/newsletter.php', 'News letter', $class) ;
    }

    function openingHoursHtml(array $hours) {        
        if (count($hours) === 0) {
            return 'Fermé';
        }

        $sentences = [];

        foreach ($hours as $hour) {
            $sentences[] = "{$hour[0]}h à {$hour[1]}h";
        }
        return implode(' et de ', $sentences);
    }

    function inHours(int $h, array $hours) {
        foreach($hours as $hour) {
            $start = $hour[0];
            $end = $hour[1];

            if ($h >= $start && $h < $end) {
                return true;
            }
        }

        return false;
    }

    function dump($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }
?>
