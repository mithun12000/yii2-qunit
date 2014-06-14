QUnit.test( "hello test", function( assert ) {
    assert.ok( 1 == "1", "Passed!" );
    var $fixture = $("#qunit-fixture #fixture-example-php");

    deepEqual($("p", $fixture).get(), getIds("hello","example"), "Finding elements with a Node context.");
});