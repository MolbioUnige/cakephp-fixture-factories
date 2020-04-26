<?php

namespace TestFixtureFactories\Test\Factory;

use TestFixtureFactories\Factory\BaseFactory;

class BillFactory extends BaseFactory
{
    protected function getRootTableRegistryName(): string
    {
        return 'TestPlugin.Bills';
    }

    protected function setDefaultTemplate()
    {
        return $this
            ->patchData([
                'amount' => $this->getFaker()->numberBetween(0, 1000)
            ])
            ->withArticle()
            ->withCustomer();
    }

    public function withArticle($parameter = null)
    {
        return $this->with('article', ArticleFactory::make($parameter));
    }

    public function withCustomer($parameter = null)
    {
        return $this->with('customer', CustomerFactory::make($parameter));
    }
}
