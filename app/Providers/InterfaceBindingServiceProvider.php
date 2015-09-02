<?php
/**
 * Author: Xavier Au
 * Date: 22/8/15
 * Time: 5:50 PM
 */

namespace avaluestay\Providers;


use avaluestay\bankinfo;
use avaluestay\Contracts\BankInfoInterface;
use avaluestay\Contracts\CurrencyInterface;
use avaluestay\Contracts\FacilityInterface;
use avaluestay\Contracts\InvoiceInterface;
use avaluestay\Contracts\MediaInterface;
use avaluestay\Contracts\MessageInterface;
use avaluestay\Contracts\NoticeInterface;
use avaluestay\Contracts\PropertyInterface;
use avaluestay\Contracts\PropertyTypeInterface;
use avaluestay\Contracts\RoomInterface;
use avaluestay\Contracts\ServiceInterface;
use avaluestay\Contracts\WishListInterface;
use avaluestay\currency;
use avaluestay\facility;
use avaluestay\invoice;
use avaluestay\media;
use avaluestay\message;
use avaluestay\notice;
use avaluestay\property;
use avaluestay\propertyType;
use avaluestay\room;
use avaluestay\service;
use avaluestay\wishList;
use Illuminate\Support\ServiceProvider;

class InterfaceBindingServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }

    public function boot()
    {
        $this->app->bind(InvoiceInterface::class, invoice::class);
        $this->app->bind(MessageInterface::class, message::class);
        $this->app->bind(PropertyInterface::class, property::class);
        $this->app->bind(PropertyTypeInterface::class, propertyType::class);
        $this->app->bind(RoomInterface::class, room::class);
        $this->app->bind(ServiceInterface::class, service::class);
        $this->app->bind(FacilityInterface::class, facility::class);
        $this->app->bind(MediaInterface::class, media::class);
        $this->app->bind(CurrencyInterface::class, currency::class);
        $this->app->bind(NoticeInterface::class, notice::class);
        $this->app->bind(BankInfoInterface::class, bankinfo::class);
        $this->app->bind(WishListInterface::class, wishList::class);
    }
}