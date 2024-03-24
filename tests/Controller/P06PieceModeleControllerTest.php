<?php

namespace App\Test\Controller;

use App\Entity\P06PieceModele;
use App\Repository\P06PieceModeleRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class P06PieceModeleControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private P06PieceModeleRepository $repository;
    private string $path = '/piece/modele/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(P06PieceModele::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('P06PieceModele index');

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
            'p06_piece_modele[id]' => 'Testing',
            'p06_piece_modele[PieceVersion]' => 'Testing',
            'p06_piece_modele[PieceValeur]' => 'Testing',
            'p06_piece_modele[PieceDateFrappee]' => 'Testing',
            'p06_piece_modele[PieceQuantiteFrappee]' => 'Testing',
            'p06_piece_modele[PaysID]' => 'Testing',
            'p06_piece_modele[PieceTranche]' => 'Testing',
            'p06_piece_modele[PieceCaracteristique]' => 'Testing',
            'p06_piece_modele[collections]' => 'Testing',
        ]);

        self::assertResponseRedirects('/piece/modele/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new P06PieceModele();
        $fixture->setId('My Title');
        $fixture->setPieceVersion('My Title');
        $fixture->setPieceValeur('My Title');
        $fixture->setPieceDateFrappee('My Title');
        $fixture->setPieceQuantiteFrappee('My Title');
        $fixture->setPaysID('My Title');
        $fixture->setPieceTranche('My Title');
        $fixture->setPieceCaracteristique('My Title');
        $fixture->setCollections('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('P06PieceModele');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new P06PieceModele();
        $fixture->setId('My Title');
        $fixture->setPieceVersion('My Title');
        $fixture->setPieceValeur('My Title');
        $fixture->setPieceDateFrappee('My Title');
        $fixture->setPieceQuantiteFrappee('My Title');
        $fixture->setPaysID('My Title');
        $fixture->setPieceTranche('My Title');
        $fixture->setPieceCaracteristique('My Title');
        $fixture->setCollections('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'p06_piece_modele[id]' => 'Something New',
            'p06_piece_modele[PieceVersion]' => 'Something New',
            'p06_piece_modele[PieceValeur]' => 'Something New',
            'p06_piece_modele[PieceDateFrappee]' => 'Something New',
            'p06_piece_modele[PieceQuantiteFrappee]' => 'Something New',
            'p06_piece_modele[PaysID]' => 'Something New',
            'p06_piece_modele[PieceTranche]' => 'Something New',
            'p06_piece_modele[PieceCaracteristique]' => 'Something New',
            'p06_piece_modele[collections]' => 'Something New',
        ]);

        self::assertResponseRedirects('/piece/modele/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getId());
        self::assertSame('Something New', $fixture[0]->getPieceVersion());
        self::assertSame('Something New', $fixture[0]->getPieceValeur());
        self::assertSame('Something New', $fixture[0]->getPieceDateFrappee());
        self::assertSame('Something New', $fixture[0]->getPieceQuantiteFrappee());
        self::assertSame('Something New', $fixture[0]->getPaysID());
        self::assertSame('Something New', $fixture[0]->getPieceTranche());
        self::assertSame('Something New', $fixture[0]->getPieceCaracteristique());
        self::assertSame('Something New', $fixture[0]->getCollections());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new P06PieceModele();
        $fixture->setId('My Title');
        $fixture->setPieceVersion('My Title');
        $fixture->setPieceValeur('My Title');
        $fixture->setPieceDateFrappee('My Title');
        $fixture->setPieceQuantiteFrappee('My Title');
        $fixture->setPaysID('My Title');
        $fixture->setPieceTranche('My Title');
        $fixture->setPieceCaracteristique('My Title');
        $fixture->setCollections('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/piece/modele/');
    }
}
