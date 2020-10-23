# Traveling man

For solve this problem I used the nearest neighbour algorithm strategy.

## Install

```git clone https://github.com/kevin92dev/traveling-man.git```

```cd traveling-man```

```docker build -t traveling_man .```

## Usage

```docker run -it traveling_man:latest bin/console app:get-traveling-man-shortest-path```

## Test
For execute the test suite execute:

```docker run -it traveling_man:latest bin/phpunit```

## FAQ
To develop this feature, some assumptions have been made:
- Input files must be on /public folder
- The input ```cities.txt``` file must be the following format:

    ```name;latitude;longitude```