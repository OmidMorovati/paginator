<?php

namespace OmidMorovati\Paginator;

class Paginator
{
    private $baseUrl;

    public function __construct($base_url = null)
    {
        $this->baseUrl = config('paginator.default_uri',$base_url);
    }

    public function paginate($total_items, $per_page, $current_page = 1)
    {
        if ($current_page <= $last_page = (int)ceil($total_items / $per_page)) {
            return self::renderPagination($total_items, $per_page, $current_page, $this->baseUrl);
        }
    }

    private static function in_array_r($needle, $haystack, $strict = false)
    {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && self::in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
        return false;
    }

    private static function renderPagination($total_items, $per_page, $current_page, $base_url)
    {

        $html = null;
        $pages = self::getPaginationButtons($total_items, $per_page, $current_page);

        $html .= '<div class="pages-nav"><ul class="pages-numbers">';
        foreach ($pages as $page) {

            $page['text'] = str_replace(['prev', 'next'], ['&laquo;', '&raquo;'], $page['text']);
            if (in_array($page['text'], ['&laquo;', '...', '&raquo;'])) {
                $html .= '<li class="page-item">
              <a class="page-link" href="' . (isset($page['number']) ? $base_url . $page['number'] : '') . '">
                <span aria-hidden="true">' . $page['text'] . '</span>
              </a>
            </li>';
            } elseif ($page['number'] === $current_page) {
                $html .= '<li class="current"><span class="pages-nav-item">' . $page['number'] . '</span></li>';
            } else {
                $html .= '<li class="page-item"><a class="page-link" href="' . $base_url . $page['number'] . '">' . $page['number'] . '</a></li>';
            }
        }
        $html .= '</ul></div>';
        return $html;
    }

    private static function getPaginationButtons($total_items, $per_page, $current_page)
    {
        $last_page = (int)ceil($total_items / $per_page);

        $pages = [];
        $middle_left_pages = [];
        $middle_right_pages = [];
        //first
        if ($current_page !== 1) {
            $pages[] = ['text' => "prev", 'number' => $current_page - 1];
        }
        $pages[] = ['text' => "1", 'number' => 1];

        for ($i = 2; $i < $current_page; $i++) {
            $middle_left_pages[] = ['text' => $i, 'number' => $i];
        }

        /*----- check if distance equal or greater than 3 ----*/
        if ($current_page - 2 >/*>=*/ 3) {
            $middle_left_pages = [['text' => "..."]];
        }

        if ($current_page - 2 > 1) {
            if (!self::in_array_r($current_page - 2, $middle_left_pages, true) && (!self::in_array_r($current_page - 2, $pages, true))) {
                $middle_left_pages[] = ['text' => $current_page - 2, 'number' => $current_page - 2];
            }
            if (!self::in_array_r($current_page - 1, $middle_left_pages, true)) {
                $middle_left_pages[] = ['text' => $current_page - 1, 'number' => $current_page - 1];
            }
        }

        $pages = array_values(array_merge($pages, $middle_left_pages));
        //current
        if (!self::in_array_r($current_page, $pages, true)) {
            $pages[] = ['text' => $current_page, 'number' => $current_page];
        }

        if (($current_page + 1 !== $last_page) && $current_page !== $last_page) {
            $middle_right_pages[] = ['text' => $current_page + 1, 'number' => $current_page + 1];
            if ($current_page + 2 !== $last_page) {
                $middle_right_pages[] = ['text' => $current_page + 2, 'number' => $current_page + 2];
            }
        }

        $pages = array_values(array_merge($pages, $middle_right_pages));

        $last_middle = $current_page + 2;

        //next
        if (($last_page - $last_middle >= 3)) {
            $pages[] = ['text' => "..."];
        } elseif (!self::in_array_r($last_page - 1, $pages, true)) {
            $pages[] = ['text' => $last_page - 1, 'number' => $last_page - 1];
        }

        if (!self::in_array_r($last_page, $pages, true)) {
            $pages[] = ['text' => $last_page, 'number' => $last_page];
        }

        if ($current_page !== $last_page) {
            $pages[] = ['text' => 'next', 'number' => $current_page + 1];
        }
        return $pages;
    }
}
