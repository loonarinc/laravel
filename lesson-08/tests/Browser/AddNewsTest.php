<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddNewsTest extends DuskTestCase
{

    use RefreshDatabase;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test1Example()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->type('title', '123')
                ->type('text', 'test')
                ->press('Добавить')
                ->assertPathIs('/admin/addNews');
        });
    }

    public function test2Example()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->type('title', '123')
                ->type('text', 'test')
                ->press('Добавить')
                ->assertSee('Количество символов в поле Заголовок новости должно быть не менее 10.')
                ->assertPathIs('/admin/addNews');
        });
    }

    public function test3Example()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->type('title', 'Заголовок для тестирования')
                ->type('text', 'Текстовый блок')
                ->press('Добавить')
                ->assertSee('Новость успешно создана!')
                ->assertPathIs('/admin/addNews');
        });
    }
    public function test4Example()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->type('title', 'Заголовок для тестирования')
                ->type('text', '')
                ->press('Добавить')
                ->assertSee('Поле Текст новости обязательно для заполнения.')
                ->assertPathIs('/admin/addNews');
        });
    }
}
