# Codeception Code Coverage for Zend Framework 2

Reference http://codeception.com/docs/11-Codecoverage

## Installation

1. Composer

```json
"require-dev": {
    "eddiejaoude/codeception-zf2-codecoverage": "*"
}
```

2. Update Dependencies

```
php composer.phar update
```

3. Added `CodeceptionZf2CodeCoverage` ZF2 Module to `config/application.config.php` 

```php
'modules' => array(
    'Application',
    'CodeceptionZf2CodeCoverage',
),
```

4. Run Code Coverage 

```
vendor/bin/codecept run --coverage --coverage-xml
```

Example Output

```
Time: 5.42 seconds, Memory: 29.75Mb

OK (12 tests, 36 assertions)


Code Coverage Report:     
  2014-10-04 09:22:55     
                          
 Summary:                 
  Classes: 50.00% (4/8)   
  Methods: 73.68% (14/19) 
  Lines:   55.68% (98/176)

\Application\Factory::ElasticSearchClientFactory
  Methods: 100.00% ( 1/ 1)   Lines: 100.00% (  3/  3)
\Application\Factory::ElasticSearchServiceFactory
  Methods: 100.00% ( 1/ 1)   Lines: 100.00% (  2/  2)
\Application\Form::SearchForm
  Methods: 100.00% ( 1/ 1)   Lines: 100.00% ( 29/ 29)
\Application\Model\Entity::Search
  Methods:  80.00% ( 8/10)   Lines:  93.62% ( 44/ 47)
\Application\Service::ElasticSearch
  Methods: 100.00% ( 3/ 3)   Lines: 100.00% ( 13/ 13)

XML report generated in coverage.xml
Text report generated in coverage.txt
```

