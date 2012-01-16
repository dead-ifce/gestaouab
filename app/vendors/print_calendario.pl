#!/usr/bin/perl -wT

use CGI ':standard';
use CGI::Carp qw(fatalsToBrowser); 

my $files_location; 
my @fileholder;

my $turma_id; 
my $ano;
my $semestre;

$turma_id = param('turma_id');
$ano = param('ano');
$semestre = param('semestre');

$files_location = "/tmp";


if ($turma_id eq '' || $ano eq '' || $semestre eq '') { 
print "Content-type: text/html\n\n"; 
print "Erro no servidor, por favor contate o adminstrador do sistema"; 
} else {
	
system("/usr/local/bin/prince http://localhost/sisgest/calendarios/print_cal/$turma_id/$ano/$semestre -o /tmp/calendario.pdf");

open(DLFILE, "<$files_location/calendario.pdf") || Error('open', 'file'); 
@fileholder = <DLFILE>; 
close (DLFILE) || Error ('close', 'file'); 

print "Content-Type:application/x-download\n"; 
print "Content-Disposition:attachment;filename=calendario.pdf\n\n";
print @fileholder
}

sub Error {
      print "Content-type: text/html\n\n";
	print "The server can't $_[0] the $_[1]: $! \n";
	exit;
}
