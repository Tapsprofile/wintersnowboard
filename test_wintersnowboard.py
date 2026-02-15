"""
Unit tests for the wintersnowboard application.
"""

import unittest
from wintersnowboard import Snowboard, SnowboardCatalog, create_sample_catalog


class TestSnowboard(unittest.TestCase):
    """Test cases for the Snowboard class."""
    
    def test_snowboard_creation(self):
        """Test creating a snowboard instance."""
        board = Snowboard(
            name="Test Board",
            brand="Test Brand",
            length=160,
            width=255,
            flex="medium",
            terrain_type="all-mountain",
            price=499.99
        )
        
        self.assertEqual(board.name, "Test Board")
        self.assertEqual(board.brand, "Test Brand")
        self.assertEqual(board.length, 160)
        self.assertEqual(board.width, 255)
        self.assertEqual(board.flex, "medium")
        self.assertEqual(board.terrain_type, "all-mountain")
        self.assertEqual(board.price, 499.99)
    
    def test_snowboard_str(self):
        """Test string representation of snowboard."""
        board = Snowboard(
            name="Test Board",
            brand="Test Brand",
            length=160,
            width=255,
            flex="medium",
            terrain_type="all-mountain",
            price=499.99
        )
        
        expected = "Test Brand Test Board - 160cm, medium flex, all-mountain, $499.99"
        self.assertEqual(str(board), expected)
    
    def test_snowboard_repr(self):
        """Test repr representation of snowboard."""
        board = Snowboard(
            name="Test Board",
            brand="Test Brand",
            length=160,
            width=255,
            flex="medium",
            terrain_type="all-mountain",
            price=499.99
        )
        
        self.assertIn("Test Board", repr(board))
        self.assertIn("Test Brand", repr(board))


class TestSnowboardCatalog(unittest.TestCase):
    """Test cases for the SnowboardCatalog class."""
    
    def setUp(self):
        """Set up test fixtures."""
        self.catalog = SnowboardCatalog()
        self.board1 = Snowboard("Board 1", "Brand A", 158, 260, "medium", "powder", 599.99)
        self.board2 = Snowboard("Board 2", "Brand B", 162, 255, "stiff", "all-mountain", 549.99)
        self.board3 = Snowboard("Board 3", "Brand A", 152, 248, "soft", "park", 449.99)
    
    def test_add_snowboard(self):
        """Test adding snowboards to catalog."""
        self.assertEqual(len(self.catalog.snowboards), 0)
        
        self.catalog.add_snowboard(self.board1)
        self.assertEqual(len(self.catalog.snowboards), 1)
        
        self.catalog.add_snowboard(self.board2)
        self.assertEqual(len(self.catalog.snowboards), 2)
    
    def test_remove_snowboard(self):
        """Test removing snowboards from catalog."""
        self.catalog.add_snowboard(self.board1)
        self.catalog.add_snowboard(self.board2)
        
        result = self.catalog.remove_snowboard("Board 1", "Brand A")
        self.assertTrue(result)
        self.assertEqual(len(self.catalog.snowboards), 1)
        
        result = self.catalog.remove_snowboard("Nonexistent", "Brand")
        self.assertFalse(result)
        self.assertEqual(len(self.catalog.snowboards), 1)
    
    def test_get_all_snowboards(self):
        """Test getting all snowboards."""
        self.catalog.add_snowboard(self.board1)
        self.catalog.add_snowboard(self.board2)
        
        all_boards = self.catalog.get_all_snowboards()
        self.assertEqual(len(all_boards), 2)
        self.assertIn(self.board1, all_boards)
        self.assertIn(self.board2, all_boards)
    
    def test_search_by_brand(self):
        """Test searching by brand."""
        self.catalog.add_snowboard(self.board1)
        self.catalog.add_snowboard(self.board2)
        self.catalog.add_snowboard(self.board3)
        
        results = self.catalog.search_by_brand("Brand A")
        self.assertEqual(len(results), 2)
        
        results = self.catalog.search_by_brand("brand a")  # Case insensitive
        self.assertEqual(len(results), 2)
        
        results = self.catalog.search_by_brand("Brand B")
        self.assertEqual(len(results), 1)
        
        results = self.catalog.search_by_brand("Nonexistent")
        self.assertEqual(len(results), 0)
    
    def test_search_by_terrain(self):
        """Test searching by terrain type."""
        self.catalog.add_snowboard(self.board1)
        self.catalog.add_snowboard(self.board2)
        self.catalog.add_snowboard(self.board3)
        
        results = self.catalog.search_by_terrain("powder")
        self.assertEqual(len(results), 1)
        self.assertEqual(results[0].name, "Board 1")
        
        results = self.catalog.search_by_terrain("PARK")  # Case insensitive
        self.assertEqual(len(results), 1)
        
        results = self.catalog.search_by_terrain("alpine")
        self.assertEqual(len(results), 0)
    
    def test_filter_by_price(self):
        """Test filtering by maximum price."""
        self.catalog.add_snowboard(self.board1)
        self.catalog.add_snowboard(self.board2)
        self.catalog.add_snowboard(self.board3)
        
        results = self.catalog.filter_by_price(500)
        self.assertEqual(len(results), 1)
        self.assertEqual(results[0].name, "Board 3")
        
        results = self.catalog.filter_by_price(600)
        self.assertEqual(len(results), 3)
        
        results = self.catalog.filter_by_price(400)
        self.assertEqual(len(results), 0)
    
    def test_filter_by_length(self):
        """Test filtering by length range."""
        self.catalog.add_snowboard(self.board1)
        self.catalog.add_snowboard(self.board2)
        self.catalog.add_snowboard(self.board3)
        
        results = self.catalog.filter_by_length(155, 160)
        self.assertEqual(len(results), 1)
        self.assertEqual(results[0].name, "Board 1")
        
        results = self.catalog.filter_by_length(150, 165)
        self.assertEqual(len(results), 3)
        
        results = self.catalog.filter_by_length(170, 180)
        self.assertEqual(len(results), 0)


class TestSampleCatalog(unittest.TestCase):
    """Test cases for the sample catalog creation."""
    
    def test_create_sample_catalog(self):
        """Test creating sample catalog."""
        catalog = create_sample_catalog()
        
        self.assertIsInstance(catalog, SnowboardCatalog)
        self.assertGreater(len(catalog.snowboards), 0)
        
        # Verify sample boards are created
        brands = [board.brand for board in catalog.snowboards]
        self.assertIn("Burton", brands)
        self.assertIn("K2", brands)


if __name__ == "__main__":
    unittest.main()
