<?php

/*
 * Part of the Stripe Laravel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Stripe Laravel
 * @version    14.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2020, Cartalyst LLC
 * @link       https://cartalyst.com
 */

namespace Cartalyst\Stripe\Tests;

use Cartalyst\Stripe\Laravel\StripeServiceProvider;
use Cartalyst\Stripe\Stripe;
use Orchestra\Testbench\TestCase;

class ServiceProviderTest extends TestCase
{
    /**
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app)
    {
        return [
            StripeServiceProvider::class,
        ];
    }

    /** @test */
    public function it_binds_the_stripe_service()
    {
        $this->app['config']->set('services.stripe', [
            'secret' => 'sk_test',
            'version' => null,
        ]);

        $this->assertInstanceOf(Stripe::class, $this->app->make('stripe'));
    }
}
