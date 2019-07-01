<?php
namespace App\Http\Middleware;

class SetDefaultValues
{
    public function __construct(
    )
    {
    }

    public function handle($request, \Closure $next)
    {
        // set default SEO title & description
        \SeoHelper::setDefaultSeo();

        return $next($request);
    }
}
