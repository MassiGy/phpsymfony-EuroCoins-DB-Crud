<?php

namespace App\Test\Controller;

use App\Entity\P06Collectionneur;
use App\Repository\P06CollectionneurRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class P06CollectionneurControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private P06CollectionneurRepository $repository;
    private string $path = '/collectionneur/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(P06Collectionneur::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('P06Collectionneur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'p06_collectionneur[id]' => 'Testing',
            'p06_collectionneur[CollectionneurNom]' => 'Testing',
            'p06_collectionneur[CollectionneurPrenom]' => 'Testing',
            'p06_collectionneur[modelesCollectionnes]' => 'Testing',
        ]);

        self::assertResponseRedirects('/collectionneur/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new P06Collectionneur();
        $fixture->setId('My Title');
        $fixture->setCollectionneurNom('My Title');
        $fixture->setCollectionneurPrenom('My Title');
        $fixture->setModelesCollectionnes('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('P06Collectionneur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new P06Collectionneur();
        $fixture->setId('My Title');
        $fixture->setCollectionneurNom('My Title');
        $fixture->setCollectionneurPrenom('My Title');
        $fixture->setModelesCollectionnes('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'p06_collectionneur[id]' => 'Something New',
            'p06_collectionneur[CollectionneurNom]' => 'Something New',
            'p06_collectionneur[CollectionneurPrenom]' => 'Something New',
            'p06_collectionneur[modelesCollectionnes]' => 'Something New',
        ]);

        self::assertResponseRedirects('/collectionneur/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getId());
        self::assertSame('Something New', $fixture[0]->getCollectionneurNom());
        self::assertSame('Something New', $fixture[0]->getCollectionneurPrenom());
        self::assertSame('Something New', $fixture[0]->getModelesCollectionnes());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new P06Collectionneur();
        $fixture->setId('My Title');
        $fixture->setCollectionneurNom('My Title');
        $fixture->setCollectionneurPrenom('My Title');
        $fixture->setModelesCollectionnes('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/collectionneur/');
    }
}
