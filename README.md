# Traveling man

For solve this problem I used the nearest neighbour algorithm strategy.

## Install

```git clone https://github.com/kevin92dev/traveling-man.git```

```cd traveling-man```

```docker build -t traveling_man .```

## Usage

```docker run -it --name traveling_man-run traveling_man:latest```

## Test
For execute the test suite execute:

```php bin/phpunit```

## FAQ
To develop this feature, some assumptions have been made:
- Input files must be on /public folder
- The input ```cities.txt``` file must be the following format:

    ```name;latitude;longitude```