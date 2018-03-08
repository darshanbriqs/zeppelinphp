# zeppelinphp
zeppelinphp is a library to help us access <a href="https://zeppelin.apache.org/docs/0.7.0/rest-api/rest-notebook.html" target="_blank">Zeppelin API</a> in PHP.

## Installation
1. Add respository in composer.json
```sh
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/darshanbriqs/zeppelinphp"
    }
]
```

2. Add as dependency in require block
```sh
"require": {
    "darshanbriqs/zeppelinphp": "dev-master"
}
```

## How to Use?
```sh
(Base URL of your Zeppelin)
$baseUrl = 'https://www.exampleurl.com';
```
// Example of List of the notes
```sh
$obj = new ZeppelinAPI\Zeppelin(['baseUrl' => $baseUrl]);
$obj->note()->all();
```
// Example of Create a new note
```sh
$obj = new ZeppelinAPI\Zeppelin(['baseUrl' => $baseUrl]);
$data['name'] = 'new note with paragraph';
$data['paragraphs'] = array(
                        'title' => 'paragraph title1',
                        'text' => 'paragraph text1',
                        'title' => 'paragraph title2',
                        'text' => 'paragraph text2'
                    );
$obj->note()->create(data);
```
