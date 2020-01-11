<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Commands Help</h1>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card shadow mb-12" id="services">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Frequently Used Commands</h6>
                </div>
                <div class="card-body row">
                    <div class="col-xl-12 col-md-12 mb-12">
                        <div>
                            <p class="text-dark mb-0"><b>top</b> command is used to show the Linux processes. It provides a dynamic real-time view of the running system</p>
                            <h6><small><kbd class="exe">top</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">htop</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>cd</b> short for Change Directory, the cd command is behind your movement from one directory to another</p>
                            <h6><small><kbd class="exe">cd</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">cd /foo/bar</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>ls</b> presents to you the contents of a particular directory – both files and directories</p>
                            <h6><small><kbd class="exe">ls</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">ll</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">lsblk</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>mkdir</b> create folders in anywhere you like in your Linux system</p>
                            <h6><small><kbd>mkdir /foo/bar/name</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>rmdir</b> command allows you to delete specific folders from your system without any hassles</p>
                            <h6><small><kbd>rmdir /foo/bar/name</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>touch</b> Creates a empty file</p>
                            <h6><small><kbd>touch /foo/bar/name</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>cat</b> will concatenate multiple files</p>
                            <h6><small><kbd>touch /foo/bar/name</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>free</b> amount of free RAM space in server</p>
                            <h6><small><kbd class="exe">free</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">free -m</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>tail</b> command is a command-line utility for outputting the last part of files given to it via standard input</p>
                            <h6><small><kbd>tail</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>tail -f /foo/bar</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>crontab</b> run on a regular schedule, and also the name of the command used to manage that list</p>
                            <h6><small><kbd>crontab</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">crontab -l</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>cp</b> copy a file or directory from one folder to another</p>
                            <h6><small><kbd>cp</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>foo.txt bar.txt</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>df</b> command that display essential information about the disk space on your filesystem</p>
                            <h6><small><kbd class="exe">df</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>uname</b> obtains system information like name, version and other system specific details</p>
                            <h6><small><kbd class="exe">uname</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">whoami</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>sudo</b> lets non-privileged users access and modify files that require low-level permissions</p>
                            <h6><small><kbd>sudo</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>sudo &#60;command&#62;</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>chmod</b> change or modify the access permissions of system files or objects</p>
                            <h6><small><kbd>chmod</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>chmod 770 /foo/bar</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>vi</b> is a screen-oriented text editor originally created for the Unix operating system</p>
                            <h6><small><kbd>vi</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>vi /foo/bar/filename</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>nano</b> nano is a text editor for Unix-like computing systems or operating environments using a command line interface</p>
                            <h6><small><kbd>vi</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>vi /foo/bar/filename</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>chown</b> enables users to change the ownership of a file or directory</p>
                            <h6><small><kbd>chown</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>chmod 770 /foo/bar</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>ps</b> allows visualize what processes are currently run by your machine</p>
                            <h6><small><kbd class="exe">ps</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">ps -a</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>kill</b> stop processes that are stuck due to resource constraints</p>
                            <h6><small><kbd>kill</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">kill -l</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">kill &#60;pid&#62;</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>ifconfig</b> is a system administration utility in Unix-like operating systems for network interface configuration</p>
                            <h6><small><kbd class="exe">ifconfig</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>ping</b> is a computer network administration software utility used to test the reachability of a host on an Internet Protocol network</p>
                            <h6><small><kbd>ping</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>ping &#60;ip address/domain&#62;</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>nslookup</b> is a network administration command-line tool  for querying the Domain Name System (DNS) to obtain domain name or IP address mapping, or other DNS records</p>
                            <h6><small><kbd>nslookup</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>nslookup &#60;fqdn&#62;</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>service</b> command is the de-facto command to invoke system-wide services from the terminal</p>
                            <h6><small><kbd class="exe">service --status-all</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">service &#60;name&#62; status</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">systemctl status &#60;name&#62;</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>find</b> used for files and directories and perform subsequent operations on them</p>
                            <h6><small><kbd>find</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>echo </b> output a specific text to the terminal console</p>
                            <h6><small><kbd>echo </kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd>echo &#60;script&#62;</kbd></small></h6>
                            <hr>
                        </div>
                        <div>
                            <p class="text-dark mb-0"><b>shutdown</b> command shuts the machine with giving a signal</p>
                            <h6><small><kbd class="exe">shutdown</kbd></small>&nbsp;&nbsp;&nbsp;<small><kbd class="exe">shutdown -h</kbd></small></h6>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info Modal-->
<div class="modal fade" id="info_modal" tabindex="-1" role="dialog" aria-labelledby="info_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-gray-100">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="info_modal_body" class="bg-white" style="width: 100%;height:100%;">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?php include('bottom.php'); ?>