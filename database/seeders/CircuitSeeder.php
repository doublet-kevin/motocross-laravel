<?php

namespace Database\Seeders;

use App\Models\Circuit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CircuitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Circuit::create([
            'name' => 'Circuit 1',
            'description' => "
                Aventure MX Park est un circuit de motocross offrant une expérience palpitante pour les amateurs de motocross de tous niveaux. Niché au cœur d'un paysage naturel spectaculaire, ce circuit offre des pistes diversifiées et stimulantes, adaptées aux débutants tout comme aux pilotes chevronnés.
                Les caractéristiques du circuit incluent des virages serrés, des sauts impressionnants, des sections techniques et des lignes droites pour permettre aux pilotes de tester leurs compétences et de vivre l'excitation du motocross. Les installations comprennent également des stands bien équipés, une zone de détente, et une équipe dévouée assurant la sécurité et le plaisir de tous les participants.
                Aventure MX Park s'engage à fournir une atmosphère conviviale, propice à la passion du motocross, où les amateurs peuvent se réunir pour partager leur amour de ce sport extrême. Que vous soyez un débutant cherchant à améliorer vos compétences ou un pilote chevronné à la recherche de sensations fortes, Aventure MX Park offre une aventure motocross inoubliable.
            ",
        ]);
        Circuit::create([
            'name' => 'Circuit 2',
            'description' => "
                Aventure MX Park est un circuit de motocross offrant une expérience palpitante pour les amateurs de motocross de tous niveaux. Niché au cœur d'un paysage naturel spectaculaire, ce circuit offre des pistes diversifiées et stimulantes, adaptées aux débutants tout comme aux pilotes chevronnés.
                Les caractéristiques du circuit incluent des virages serrés, des sauts impressionnants, des sections techniques et des lignes droites pour permettre aux pilotes de tester leurs compétences et de vivre l'excitation du motocross. Les installations comprennent également des stands bien équipés, une zone de détente, et une équipe dévouée assurant la sécurité et le plaisir de tous les participants.
                Aventure MX Park s'engage à fournir une atmosphère conviviale, propice à la passion du motocross, où les amateurs peuvent se réunir pour partager leur amour de ce sport extrême. Que vous soyez un débutant cherchant à améliorer vos compétences ou un pilote chevronné à la recherche de sensations fortes, Aventure MX Park offre une aventure motocross inoubliable.
            ",
        ]);
        Circuit::create([
            'name' => 'Circuit 3',
            'description' => "
                Aventure MX Park est un circuit de motocross offrant une expérience palpitante pour les amateurs de motocross de tous niveaux. Niché au cœur d'un paysage naturel spectaculaire, ce circuit offre des pistes diversifiées et stimulantes, adaptées aux débutants tout comme aux pilotes chevronnés.
                Les caractéristiques du circuit incluent des virages serrés, des sauts impressionnants, des sections techniques et des lignes droites pour permettre aux pilotes de tester leurs compétences et de vivre l'excitation du motocross. Les installations comprennent également des stands bien équipés, une zone de détente, et une équipe dévouée assurant la sécurité et le plaisir de tous les participants.
                Aventure MX Park s'engage à fournir une atmosphère conviviale, propice à la passion du motocross, où les amateurs peuvent se réunir pour partager leur amour de ce sport extrême. Que vous soyez un débutant cherchant à améliorer vos compétences ou un pilote chevronné à la recherche de sensations fortes, Aventure MX Park offre une aventure motocross inoubliable.
            ",
        ]);
    }
}
