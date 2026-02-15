# wintersnowboard

A Python application for managing and cataloging winter snowboards with their specifications.

## Features

- **Snowboard Management**: Create and manage snowboard entries with detailed specifications
- **Catalog System**: Organize multiple snowboards in a searchable catalog
- **Search Capabilities**: 
  - Search by brand
  - Search by terrain type (powder, all-mountain, park, alpine)
- **Filter Options**:
  - Filter by maximum price
  - Filter by length range
- **Sample Data**: Includes pre-populated sample catalog for demonstration

## Installation

This application requires Python 3.6 or higher. No external dependencies are required.

```bash
# Clone the repository
git clone https://github.com/Tapsprofile/wintersnowboard.git
cd wintersnowboard
```

## Usage

### Running the Application

```bash
python wintersnowboard.py
```

This will display a demo of the catalog functionality, showing:
- All snowboards in the catalog
- Search results by brand (Burton)
- Search results by terrain (powder)
- Filtered results by price (under $600)
- Filtered results by length (155-160cm)

### Using as a Library

```python
from wintersnowboard import Snowboard, SnowboardCatalog

# Create a catalog
catalog = SnowboardCatalog()

# Add a snowboard
board = Snowboard(
    name="Powder Hunter",
    brand="Burton",
    length=158,
    width=260,
    flex="medium",
    terrain_type="powder",
    price=599.99
)
catalog.add_snowboard(board)

# Search for snowboards
burton_boards = catalog.search_by_brand("Burton")
powder_boards = catalog.search_by_terrain("powder")
affordable_boards = catalog.filter_by_price(600)
```

## Snowboard Attributes

Each snowboard in the catalog has the following attributes:

- **name**: Model name of the snowboard
- **brand**: Manufacturer brand
- **length**: Length in centimeters
- **width**: Width in millimeters
- **flex**: Flex rating (soft, medium, stiff)
- **terrain_type**: Best suited terrain (powder, all-mountain, park, alpine)
- **price**: Price in USD

## Testing

Run the test suite:

```bash
python -m unittest test_wintersnowboard.py
```

Or with verbose output:

```bash
python -m unittest test_wintersnowboard.py -v
```

## API Reference

### Snowboard Class

```python
Snowboard(name, brand, length, width, flex, terrain_type, price)
```

Creates a new snowboard instance with the specified attributes.

### SnowboardCatalog Class

#### Methods:

- `add_snowboard(snowboard)`: Add a snowboard to the catalog
- `remove_snowboard(name, brand)`: Remove a snowboard by name and brand
- `get_all_snowboards()`: Get all snowboards in the catalog
- `search_by_brand(brand)`: Search for snowboards by brand (case-insensitive)
- `search_by_terrain(terrain_type)`: Search by terrain type (case-insensitive)
- `filter_by_price(max_price)`: Filter snowboards by maximum price
- `filter_by_length(min_length, max_length)`: Filter by length range

## License

This project is open source and available under the MIT License.
