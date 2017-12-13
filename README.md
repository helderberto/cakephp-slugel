# CakePHP 2.x Slugel

Simple way to create slug's to your results

## Getting Started

These instructions to running this behavior in your project.

### Prerequisities

1. [CakePHP 2.x](https://github.com/cakephp/cakephp/tree/2.x);

### Installing

1. Clone the project into your Plugin folder located within your project using this `https://github.com/helderburato/cakephp-slugel`;

2. Rename the folder `cakephp-slugel` to `Slugel`;

## How to use

1. In your model, just load in $actsAs:

Default use the field `name` and make `virtualField` like `slug` in your results.
````
public $actsAs = array(
  'Slugel.Slugel'
);
````

If your want to use other field and make other slug name, run like this:
````
public $actsAs = array(
  'Slugel.Slugel' => array(
    'field' => 'otherField',
    'slug' => 'mySlugField'
  )
);
````

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning.

## Authors

* **Helder Burato Berto** - *Initial work* - [helderburato](https://github.com/helderburato)

See also the list of [contributors](https://github.com/helderburato/cakephp-slugel/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details