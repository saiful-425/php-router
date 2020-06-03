<?php namespace OurApplication\Routing;

class Router
{
    private static $noMatch = true;

    private static function getUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }

    private static function getMatches($pattern)
    {
        $url = self::getUrl();
        if (preg_match($pattern, $url, $matches)) {
            return $matches;
        }
        return false;
    }

    public static function get($pattern, $callback)
    {
        $pattern = "~^{$pattern}/?$~";
        $params = self::getMatches($pattern);
        if ($params) {
            if (is_callable($callback)) {
                self::$noMatch = false;
                $functionArguments = array_slice($params, 1);
                $callback(...$functionArguments);
            }
        }
    }

    public static function cleanup()
    {
        if (self::$noMatch) {
            echo "No Routes Matched";
        }
    }
}