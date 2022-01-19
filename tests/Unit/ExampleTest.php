<?php

namespace Tests\Unit;

use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testValidation()
    {
        $ins = new AuthenticationController();
        $request = new Request([
                'email' => 'sally@example.com'
        ]);
        $this->assertEmpty($ins->validateUser($request,['email'=>'required', 'name'=>'required']),'Error');
    }
}
