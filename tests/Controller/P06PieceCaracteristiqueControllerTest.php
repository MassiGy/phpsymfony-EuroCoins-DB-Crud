<?php

namespace App\Test\Controller;

use App\Entity\P06PieceCaracteristique;
use App\Repository\P06PieceCaracteristiqueRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class P06PieceCaracteristiqueControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private P06PieceCaracteristiqueRepository $repository;
    private string $path = '/piece/caracteristique/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(P06PieceCaracteristique::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('P06PieceCaracteristique index');

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
            'p06_piece_caracteristique[id]' => 'Testing',
            'p06_piece_caracteristique[PieceFaceCommune]' => 'Testing',
            'p06_piece_caracteristique[PieceMasse]' => 'Testing',
            'p06_piece_caracteristique[PieceTaille]' => 'Testing',
            'p06_piece_caracteristique[PieceMateriau]' => 'Testing',
        ]);

        self::assertResponseRedirects('/piece/caracteristique/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new P06PieceCaracteristique();
        $fixture->setId('My Title');
        $fixture->setPieceFaceCommune('My Title');
        $fixture->setPieceMasse('My Title');
        $fixture->setPieceTaille('My Title');
        $fixture->setPieceMateriau('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('P06PieceCaracteristique');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new P06PieceCaracteristique();
        $fixture->setId('My Title');
        $fixture->setPieceFaceCommune('My Title');
        $fixture->setPieceMasse('My Title');
        $fixture->setPieceTaille('My Title');
        $fixture->setPieceMateriau('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'p06_piece_caracteristique[id]' => 'Something New',
            'p06_piece_caracteristique[PieceFaceCommune]' => 'Something New',
            'p06_piece_caracteristique[PieceMasse]' => 'Something New',
            'p06_piece_caracteristique[PieceTaille]' => 'Something New',
            'p06_piece_caracteristique[PieceMateriau]' => 'Something New',
        ]);

        self::assertResponseRedirects('/piece/caracteristique/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getId());
        self::assertSame('Something New', $fixture[0]->getPieceFaceCommune());
        self::assertSame('Something New', $fixture[0]->getPieceMasse());
        self::assertSame('Something New', $fixture[0]->getPieceTaille());
        self::assertSame('Something New', $fixture[0]->getPieceMateriau());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new P06PieceCaracteristique();
        $fixture->setId('My Title');
        $fixture->setPieceFaceCommune('My Title');
        $fixture->setPieceMasse('My Title');
        $fixture->setPieceTaille('My Title');
        $fixture->setPieceMateriau('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/piece/caracteristique/');
    }
}
