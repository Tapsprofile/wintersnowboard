"""
Winter Snowboard Catalog Application

A simple application to manage and catalog winter snowboards with their specifications.
"""

class Snowboard:
    """Represents a winter snowboard with its specifications."""
    
    def __init__(self, name, brand, length, width, flex, terrain_type, price):
        """
        Initialize a snowboard.
        
        Args:
            name (str): Name/model of the snowboard
            brand (str): Manufacturer brand
            length (int): Length in cm
            width (int): Width in mm
            flex (str): Flex rating (soft, medium, stiff)
            terrain_type (str): Best terrain (powder, all-mountain, park, alpine)
            price (float): Price in USD
        """
        self.name = name
        self.brand = brand
        self.length = length
        self.width = width
        self.flex = flex
        self.terrain_type = terrain_type
        self.price = price
    
    def __str__(self):
        return (f"{self.brand} {self.name} - {self.length}cm, "
                f"{self.flex} flex, {self.terrain_type}, ${self.price:.2f}")
    
    def __repr__(self):
        return (f"Snowboard(name='{self.name}', brand='{self.brand}', "
                f"length={self.length}, width={self.width}, "
                f"flex='{self.flex}', terrain_type='{self.terrain_type}', "
                f"price={self.price})")


class SnowboardCatalog:
    """Manages a collection of winter snowboards."""
    
    def __init__(self):
        """Initialize an empty catalog."""
        self.snowboards = []
    
    def add_snowboard(self, snowboard):
        """
        Add a snowboard to the catalog.
        
        Args:
            snowboard (Snowboard): The snowboard to add
        """
        self.snowboards.append(snowboard)
    
    def remove_snowboard(self, name, brand):
        """
        Remove a snowboard from the catalog.
        
        Args:
            name (str): Name of the snowboard
            brand (str): Brand of the snowboard
        
        Returns:
            bool: True if removed, False if not found
        """
        for i, board in enumerate(self.snowboards):
            if board.name == name and board.brand == brand:
                self.snowboards.pop(i)
                return True
        return False
    
    def get_all_snowboards(self):
        """
        Get all snowboards in the catalog.
        
        Returns:
            list: List of all snowboards
        """
        return self.snowboards
    
    def search_by_brand(self, brand):
        """
        Search for snowboards by brand.
        
        Args:
            brand (str): Brand to search for
        
        Returns:
            list: List of matching snowboards
        """
        return [board for board in self.snowboards if board.brand.lower() == brand.lower()]
    
    def search_by_terrain(self, terrain_type):
        """
        Search for snowboards by terrain type.
        
        Args:
            terrain_type (str): Terrain type to search for
        
        Returns:
            list: List of matching snowboards
        """
        return [board for board in self.snowboards 
                if board.terrain_type.lower() == terrain_type.lower()]
    
    def filter_by_price(self, max_price):
        """
        Filter snowboards by maximum price.
        
        Args:
            max_price (float): Maximum price
        
        Returns:
            list: List of snowboards within price range
        """
        return [board for board in self.snowboards if board.price <= max_price]
    
    def filter_by_length(self, min_length, max_length):
        """
        Filter snowboards by length range.
        
        Args:
            min_length (int): Minimum length in cm
            max_length (int): Maximum length in cm
        
        Returns:
            list: List of snowboards within length range
        """
        return [board for board in self.snowboards 
                if min_length <= board.length <= max_length]


def create_sample_catalog():
    """Create and populate a sample catalog with winter snowboards."""
    catalog = SnowboardCatalog()
    
    # Add sample snowboards
    catalog.add_snowboard(Snowboard(
        name="Powder Hunter",
        brand="Burton",
        length=158,
        width=260,
        flex="medium",
        terrain_type="powder",
        price=599.99
    ))
    
    catalog.add_snowboard(Snowboard(
        name="Mountain Master",
        brand="K2",
        length=162,
        width=255,
        flex="stiff",
        terrain_type="all-mountain",
        price=549.99
    ))
    
    catalog.add_snowboard(Snowboard(
        name="Park Pro",
        brand="Ride",
        length=152,
        width=248,
        flex="soft",
        terrain_type="park",
        price=449.99
    ))
    
    catalog.add_snowboard(Snowboard(
        name="Alpine Beast",
        brand="Jones",
        length=165,
        width=258,
        flex="stiff",
        terrain_type="alpine",
        price=679.99
    ))
    
    return catalog


def main():
    """Main function demonstrating the catalog functionality."""
    print("=" * 60)
    print("Winter Snowboard Catalog")
    print("=" * 60)
    print()
    
    # Create sample catalog
    catalog = create_sample_catalog()
    
    # Display all snowboards
    print("All Snowboards in Catalog:")
    print("-" * 60)
    for board in catalog.get_all_snowboards():
        print(f"  {board}")
    print()
    
    # Search by brand
    print("Burton Snowboards:")
    print("-" * 60)
    for board in catalog.search_by_brand("Burton"):
        print(f"  {board}")
    print()
    
    # Search by terrain
    print("Powder Snowboards:")
    print("-" * 60)
    for board in catalog.search_by_terrain("powder"):
        print(f"  {board}")
    print()
    
    # Filter by price
    print("Snowboards under $600:")
    print("-" * 60)
    for board in catalog.filter_by_price(600):
        print(f"  {board}")
    print()
    
    # Filter by length
    print("Snowboards between 155-160cm:")
    print("-" * 60)
    for board in catalog.filter_by_length(155, 160):
        print(f"  {board}")
    print()


if __name__ == "__main__":
    main()
