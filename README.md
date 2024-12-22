# seznam_zamestnancu
Seminarni prace - Webove techonologie - 3.sem

## System pro spravu zamestnancu
Data jsou uchovany v mysql databazi ve 3 tabulkach
- Employee: ID(int), fname(string), lname(string), worktitle(string), active(bool), division(int:division_id)
- Division: ID(int), title(string)
- EMP_DIV: ID_emp(int), ID_div(int)

## Pouzite technologie
Hlavnim stavebnim kamenem je vyuziti frameworku Symfony v.6.4.* ve spojeni s mysql databazi. Projekt je umisten na skolnim serveru.

## Funkce
Jsou k dispozici 2 urovne pristupu - Admin a User.
Po registraci User muze pouze prohlizet seznam, Admin ma opravneni na zmeny, vytvareni novych zaznamu a mazani.
