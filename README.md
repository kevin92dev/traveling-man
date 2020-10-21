# Traveling man

To solve this shortest path problem, I have chosen to use the [Dijkstra algorithm](https://en.wikipedia.org/wiki/Dijkstra%27s_algorithm)

## Install
(Pending)

## Usage

```php bin/console app:get-traveling-man-shortest-path```

Optional:
- You can specify a ```--cities-file``` option for change the input file

## FAQ
To develop this feature, some assumptions have been made:
- Input files has to be on /public folder
- The input file has to be the following format:
    ```name;x_coordinate;y_coordinate```