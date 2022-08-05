<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderListControllerTest extends TestCase
{
    //use RefreshDatabase;

    public function test_order_list()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/order');
        //
        $response->assertStatus(200);
    }

    public function test_search_order_list()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/order/search',['search' => 'tea']);
        //
        $response->assertStatus(200);
    }

    public function test_the_order_page_is_rendered_properly()
    {
        $this->withoutExceptionHandling();
        //I want to create order
        $response = $this->get('/order/create');
        //
        $response->assertStatus(200);
    }

    //Test add order
    public function test_add_order_success()
    {
        $product1 = Product::create([
            'product_name' => "Milk tea star",
            'price' => 29000,
            'description' => "Trà sữa trân châu hoàng kim siêu ngon"
        ]);

        $customer1 = Customer::create([
            'full_name' => "Trần Hà Hữu Cường",
            'email' => "kimanhlagi14@gmail.com",
            'address' => "Lagi - Bình Thuận",
            'phone' => "0908179750",
        ]);
        $this->session([
            'cart' => [
                2 => [
                    'id' => 2,
                    'product_name' => "Milk tea star",
                    'price' => 29000,
                    'quantity' => 1,
                ]
            ]
        ]);
        $response = $this->withSession(['cart'])
            ->call('POST', '/order', [
                "_token" => "lGZrpIScqjekKSKwFK3zFNvfSFg7x47LMLrM7XLX",
                "customer" => "2",
                "order_note" => "sss"
            ]);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('orders', [
            'id' => 1,
            'customer_id' => 2,
            'order_note' => "sss",
            'status' => 0
        ]);
        $this->assertDatabaseHas('order_detail', [
            'order_id' => 1,
            'product_id' => 2,
            'quantity' => 1,
            'price' => 29000
        ]);
    }

    //Test edit status order
    public function test_edit_status_order_success()
    {
        $product1 = Product::create([
            'product_name' => "Milk tea star",
            'price' => 29000,
            'description' => "Trà sữa trân châu hoàng kim siêu ngon"
        ]);

        $customer1 = Customer::create([
            'full_name' => "Trần Hà Hữu Cường",
            'email' => "kimanhlagi14@gmail.com",
            'address' => "Lagi - Bình Thuận",
            'phone' => "0908179750",
        ]);
        $this->session([
            'cart' => [
                2 => [
                    'id' => 2,
                    'product_name' => "Milk tea star",
                    'price' => 29000,
                    'quantity' => 1,
                ]
            ]
        ]);
        $response = $this->call('POST', '/order/1/edit', [
                "status" => "2",
            ]);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('orders', [
            'id' => 1,
            'customer_id' => 2,
            'order_note' => "sss",
            'status' => 2
        ]);
    }

    //Test delete order success
    public function test_delete_order_success()
    {
        $this->withoutMiddleware();
        $response = $this->call('DELETE', '/order/3');
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseMissing('orders', ['id' => 3]);
        $this->assertDatabaseMissing('order_detail', ['order_id' => 3]);
    }
}
