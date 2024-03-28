CREATE TABLE students (
    cpf TEXT PRIMARY KEY,
    name TEXT,
    email TEXT
)

CREATE TABLE students_phones (
    ddd TEXT,
    number TEXT,
    student_cpf TEXT,
    PRIMARY KEY (ddd, number),
    FOREIGN KEY (student_cpf) REFERENCES students(cpf)
)

CREATE TABLE recommendations (
    recommended_student_cpf TEXT,
    referrer_student_cpf TEXT,
    recommended_at TEXT,
    PRIMARY KEY (recommended_student_cpf, referrer_student_cpf),
    FOREIGN KEY (recommended_student_cpf) REFERENCES students(cpf),
    FOREIGN KEY (referrer_student_cpf) REFERENCES students(cpf)
)