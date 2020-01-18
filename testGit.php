<?PHP






?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>test Git</title>

<style>
  li {padding: 10px;}

  ol {font-size: 10px;}
</style>
</head>
<body>
    <h1>Tamera Peake</h1>

      <?php
        echo "<h4>Wrote this in PHP</h4>";
        echo "<h4>Here's a list of common Git Terms</h4>";
       ?>

      <ul>Define the following Git Terms
        <li>Version Control Software</li>
          <p>Version Control Software (VCS) is a "system that records changes to a file or set of files over time so that you can recall specific versions later." It provides the ability to revise or revert your project to a previous state and even compare changes. VCS allows you to keep tabs on who is altering your projects, as well as, mistakes that are made. </p>

        <p>source: 1</p>
        <li>Add</li>

          <p> Git Add temporarily adds a change or update to the file. I mean temporarily because it the change doesn't affect the file until you run Git commit.</p>

          <p>source: 2</p>
        <li>Commit</li>

          <p>Git Commit "snapshots" changes made which are then added to the local repository. These snapshots are considered "safe" versions of a project. They can't be changed unless the programmer changes.</p>

          <p>source: 2</p>

        <li>Push</li>

          <p>Git Push is used to upload local repository content to a remote repository. It's how you transfer Commit content from the local repo to the remote repo. You should be aware that Git Push has the power to overwite changes.

          <p> source: 3</p>
        <li>Pull</li>
          <p>Git Pull is used to fetch and download content from a remote repository to a local repository. It's used to merge changes from the remote to the local repo.  It's very common in collaborative work flows.</p>

          <p> source: 4</p>
        <li>Clone</li>
          <p>Git Clone is used to clone or copy an existing repository.</p>
            <ul>Common usage of cloning include:
              <li>Cloning a local or remote repo</li>
              <li>Cloning a bare repo</li>
              <li>Partially clone repos</li>
              <li>Git URL syntax and supported protocols</li>
            </ul>

          <p> source: 5</p>
      </ul>

      <ol>
        <li><a href="https://git-scm.com/book/en/v2/Getting-Started-About-Version-Control">https://git-scm.com/book/en/v2/Getting-Started-About-Version-Control</a></li>

        <li><a href="https://www.atlassian.com/git/tutorials/saving-changes/git-commit">https://www.atlassian.com/git/tutorials/saving-changes/git-commit</a></li>

        <li><a href="https://www.atlassian.com/git/tutorials/syncing/git-push">https://www.atlassian.com/git/tutorials/syncing/git-push</a></li>

        <li><a href="https://www.atlassian.com/git/tutorials/syncing/git-pull">https://www.atlassian.com/git/tutorials/syncing/git-pull</a></li>

        <li><a href="https://www.atlassian.com/git/tutorials/setting-up-a-repository/git-clone">https://www.atlassian.com/git/tutorials/setting-up-a-repository/git-clone</a></li>
      </ol>
</body>
</html>
