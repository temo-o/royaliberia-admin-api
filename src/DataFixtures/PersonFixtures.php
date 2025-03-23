<?php
namespace App\DataFixtures;

use App\Entity\{Person, PersonType};
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Exception;

class PersonFixtures extends Fixture
{
    /**
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $filePath = __DIR__ . '/../../data/kings.json';

        if (!file_exists($filePath)) {
            echo "File not found: $filePath\n";
            return;
        }

        $jsonContent = file_get_contents($filePath);
        if ($jsonContent === false) {
            echo "Error reading file: $filePath\n";
            return;
        }

        $kingsData = json_decode($jsonContent, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "Error parsing JSON: " . json_last_error_msg() . "\n";
            return;
        }

        $personType = $manager->getRepository(PersonType::class)->find(3);
        print_r($personType);


        foreach ($kingsData as $kingData) {
            $king = new Person();
            $king->setPersonType($personType);
            $king->setFirstName($kingData['first_name'] ?? null);
            $king->setLastName($kingData['last_name'] ?? null);
            $king->setAdditionalName($kingData['additional_name'] ?? null);
            $king->setPseudonym($kingData['pseudonym'] ?? null);
            $king->setCourtesyTitle($kingData['courtesy_title'] ?? null);
            $king->setTitle($kingData['title'] ?? null);
            $king->setDateOfBirth($kingData['date_of_birth'] ?? null);
            $king->setCreatedAt(new DateTime());
            $king->setUpdatedAt(isset($kingData['updated_at']) ? new DateTime($kingData['updated_at']) : null);
            $king->setImageSequenceCount($kingData['image_sequence_count'] ?? 0);
            $king->setDateOfDeath($kingData['date_of_death'] ?? null);
            $king->setPositionStartYear($kingData['position_start_year'] ?? null);
            $king->setPositionEndYear($kingData['position_end_year'] ?? null);
            $king->setPositionExactStartDate($kingData['position_exact_start_date'] ?? null);
            $king->setPositionExactEndDate($kingData['position_exact_end_date'] ?? null);

            print_r($king);

            $manager->persist($king);
        }

        $manager->flush();
        echo "Fixtures loaded successfully.\n";
    }
}
