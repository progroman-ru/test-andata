<?php

namespace App\System;

/**
 * Class Controller
 * Базовый класс для контроллеров
 * @package App\System
 */
abstract class Controller
{
    /**
     * Рендерит шаблон
     * @param string $template Имя шаблона
     * @param array $data Данные для передачи в шаблон
     * @return string
     * @throws \Exception
     */
    protected function view(string $template, array $data) : string
    {
        $template = preg_replace('#[^a-zA-Z0-9_/]#', '', $template);
        $file = TEMPLATE_DIR . $template . '.php';
        if (!is_file($file)) {
            throw new \Exception('Template "' . $file . '" not found');
        }

        extract($data);

        ob_start();

        require($file);

        return ob_get_clean();
    }
}
