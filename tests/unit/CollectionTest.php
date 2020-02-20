<?php

use PHPUnit\Framework\TestCase;
use App\Support\Collection;

class CollectionTest extends TestCase {

  protected $collection;
  protected $collection1;
  protected $collection2;
  protected $emptyCollection;
  protected $extendedCollecton;

  public function setUp() : void
  {
    $this->emptyCollection = new Collection();

    $this->collection = new Collection([
        'one', 'two', 'three',
    ]);
    $this->collection2 = new Collection([
        'four', 'five', 'six',
    ]);
    $this->collection1 = new Collection([
        'one', 'two'
    ]);
    $this->extendedCollecton = new Collection([
        ['username' => 'user1'],
        ['username' => 'user2'],
    ]);
  }

  public function test_init_collection_returns_no_items()
  {
    $this->assertEmpty($this->emptyCollection->get());
  }

  public function test_count_is_correct_for_items_passed()
  {
    $this->assertEquals(3, $this->collection->count());
  }

  public function test_items_returned_match_items_passed_in()
  {
    $collection = new Collection([
        'one', 'two'
    ]);

    $this->assertCount(2, $collection->get());
    $this->assertEquals('one', $collection->get()[0]);
    $this->assertEquals('two', $collection->get()[1]);

  }

  public function test_collection_is_instance_of_iterator_aggregate()
  {
    $this->assertInstanceOf(IteratorAggregate::class, $this->emptyCollection);
  }

  public function test_collection_can_be_iterate()
  {
    $items = [];
    foreach($this->collection as $item) {
        $items[] = $item;
    }
    $this->assertCount(3, $items);
    $this->assertInstanceOf(ArrayIterator::class, $this->collection->getIterator());

  }

  public function test_collection_can_be_merged_with_another_collection()
  {

    // $mergedCollection = $this->collection->oldMerge($this->collection2);

    // $this->assertCount(6, $mergedCollection->get());
    // $this->assertEquals(6, $mergedCollection->count());
    // Let's refactor code above.
    $this->collection->merge($this->collection2);
    $this->assertCount(6, $this->collection->get());
    $this->assertEquals(6, $this->collection->count());

  }

  public function test_can_add_to_exsting_collection()
  {
    $this->collection1->add(['three']);
    $this->assertCount(3, $this->collection1->get());
    $this->assertEquals(3, $this->collection1->count());

  }

  public function test_returns_encode_json_items()
  {
    $this->assertIsString($this->extendedCollecton->toJson());
    $this->assertEquals('[{"username":"user1"},{"username":"user2"}]', $this->extendedCollecton->toJson());
  }

  public function test_json_encoding_a_collection_object_returns_json()
  {
    $encodedCollection = json_encode($this->extendedCollecton);
    $this->assertIsString($encodedCollection);
    $this->assertEquals('[{"username":"user1"},{"username":"user2"}]', $encodedCollection);
  }
}
